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

// 全ての投稿を取得
$posts= Post::get();
return view('posts.index',['posts'=>$posts]);

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

public function create()
    {
        $user = auth()->user();

        return view('posts.index', [
            'user' => $user
        ]);
    }

public function edit(posts $posts)
{
$user = auth()->user();
$posts = $posts->getEditTweet($user->id, $posts->id);

if (!isset($posts)) {
return redirect('posts.edit');
}

return view('posts.edit', [
'user'   => $user,
'posts' => $posts
]);
}

}
