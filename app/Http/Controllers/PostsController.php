<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use Validator;

class PostsController extends Controller
{

    //
public function index(){

  // フォローしているユーザーのidを取得
 $following_id = Auth::user()->follows()->pluck('followed_id');
     // フォローしているユーザーのidを元に投稿内容を取得
  $posts = Post::with('user')->whereIn('user_id',$following_id)->get();

   return view('posts.index',['posts'=>$posts],);


}

pUblic function store(Request $request){

// バリデーション設定
$validator=Validator::make($request->all(),[
   'post'=>'required','max:200','min:1'
]);

//バリデーションエラー
if ($validator->fails()) {
return redirect('/top')
->withInput()
->withErrors($validator);
}

//以下、登録処理を記述する。（Eloquentモデル）
$posts = new Post;
$posts->post = $request->post;
$posts->user_id = Auth::id();
//↑（上記）ここでログインしているユーザidを登録してる。
$posts->save();

//↓リクエスト送ったページに戻る（/topにリダイレクトする）
return back();

}

//投稿編集の処理
     public function update(Request $request)
    {
      $form = $request->input('text');
      $id = $request->input('id');
      Post::where('id',$id)->update(['post' => $form]);

        return redirect('/top');//保存後はリダイレクトさせたいページを指定したりする
    }

//投稿削除の処理
  public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();
        return redirect('/top');
    }

  public function followList(){
       // フォローしているユーザーのidを取得
  $following_id = Auth::user()->follows()->pluck('followed_id');
     // フォローしているユーザーのidを元に投稿内容を取得
  $posts = Post::with('user')->whereIn('user_id',$following_id)->get();

        return view('indax',['posts' => $posts ]);

    }


}
