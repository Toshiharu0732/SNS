<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Request as SearchRequest;
use App\User;
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
        $user->images = $request->images;



        $user->update();
        return redirect('/top');//保存後はリダイレクトさせたいページを指定したりする
    }

   public function store(Request $request)
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

        // $request->imagesはformのinputのname='images'の値です
        $path = $request->file('images')->store('public/images');

        // パスから、最後の「ファイル名.拡張子」の部分だけ取得します 例)sample.jpg

        $filename = basename($path);

         // FileImageをインスタンス化(実体化)します

         User::where('id',Auth::id())->update(['images' => $filename]);

        return redirect('/top');//保存後はリダイレクトさせたいページを指定したりする
    }

 public function search(Request $request) {
      //ユーザー検索
      $users = SearchRequest::get('name');

      $request = User::query();

       if(!empty($users))
  {
    $request->where('username','like','%'.$users.'%');
  }
  $users = $request->orderBy('username','desc')->paginate(20);
    return view('users.search')->with('users', $users);
    }



}
