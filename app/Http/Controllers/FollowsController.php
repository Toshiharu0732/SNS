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
       $posts = Post::get();

        return view('follows.followList',['posts' => $posts ]);

    }

    public function followerList(){

        $posts = Post::get();

        return view('follows.followList',['posts' => $posts ]);

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

}
