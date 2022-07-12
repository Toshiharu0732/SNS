<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\User;
use App\Post;
use App\Follow;


class FollowsController extends Controller
{
    //
    public function followList(){
       // フォローしているユーザーのidを取得
  $following_id = Auth::user()->follows()->pluck('followed_id');
     // フォローしているユーザーのidを元に投稿内容を取得
  $posts = Post::with('user')->whereIn('user_id',$following_id)->get();

   $users = Auth::user()->follows()->pluck('images');

        return view('follows.followList',['posts' => $posts,'users' => $users ]);

    }

    public function followerList(){

            // フォローされているユーザーのidを取得
  $followed_id = Auth::user()->followUsers()->pluck('following_id');
     // フォローされているユーザーのidを元に投稿内容を取得
  $posts = Post::with('user')->whereIn('user_id',$followed_id)->get();

  $users = Auth::user()->followUsers()->pluck('images');

        return view('follows.followList',['posts' => $posts,'users' => $users ]);

    }


     public function follow($id) {

        $follow = Auth::id();
        Follow::create([
         'following_id' => $follow,
         'followed_id' => $id
        ]);

         $followCount = count(Follow::where('followed_id', Auth::user()->id)->get());


        return back();

    }

     public function unfollow($id) {

        $follow = Auth::id();
        Follow::where('following_id', $follow)->where('followed_id',$id)->delete();

         return back();
    }



     // 7/13ここから

     public function profile(){

               // ユーザーのidを取得
  $user_id = Auth::user()->pluck('id');
     // ユーザーのidを元に投稿内容を取得
  $posts = Post::with('user')->whereIn('user_id',$user_id)->get();



        return view('users.usersProfile',['posts' => $posts ]);
    }

}
