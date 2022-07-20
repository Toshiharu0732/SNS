<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Request as SearchRequest;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class UsersController extends Controller
{
     //プロフィール表示
    public function profile(){

      $user = Auth::user();
      $id = Auth::id();

        return view('users.profile',['user'=>$user]);
    }

     //プロフィール更新
      public function update(Request $request)
    {

      $validator = Validator::make($request->all(), [
            'username' => 'required|max:12|min:2',
            'mail' => 'required|email|max:40|min:5|',
            'password' => 'required|alpha_num|min:8|max:20|confirmed',
            'password_confirmation' => 'required',
            'bio' => 'max:150',
            'images' => 'image',
        ]);

         if($validator->fails()){
                return redirect('/profile')
                ->withErrors($validator)
                ->withInput();
            }


        $user = Auth::user();
        $user->username = $request->username;
        $user->mail = $request->mail;
        $user->password = bcrypt($request->password);
        $user->bio = $request->bio;

        if ($request->hasFile('images')) {
           $path = $request->file('images')->store('public/images');
            $user->images = basename($path);
        }


        $user->update();
        return redirect('/top');//保存後はリダイレクトさせたいページを指定したりする
    }


 public function search(Request $request) {
      //ユーザー検索
      $users = SearchRequest::get('name');
      $request->session()->put('name',$users);
      $request = User::query();

       if(!empty($users))
  {
    $request->where('username','like','%'.$users.'%');
  }
  $users = $request->orderBy('username','desc')->paginate(20);
    return view('users.search')->with('users', $users);

    }


     public function userProfile($id){
           //上の＄idはリストから送られて来るid
               // ユーザーのidを取得
    $user=User::where('id',$id)->first();

   $posts = Post::with('user')->whereIn('user_id',$user)->get();
    // ↑first();にすると一番最初の値のみとるのでループがされなくなる。
   // ちなみに $posts = Post::where('user_id',$id)->get(); でも可
        return view('users.usersProfile',['posts' => $posts ],['user' => $user ]);
    }


       public function follow($id) {

        $follow = Auth::id();
        Follow::create([
         'following_id' => $follow,
         'followed_id' => $id
        ]);
        return back();

    }

     public function unfollow($id) {

        $follow = Auth::id();
        Follow::where('following_id', $follow)->where('followed_id',$id)->delete();

         return back();
    }





}
