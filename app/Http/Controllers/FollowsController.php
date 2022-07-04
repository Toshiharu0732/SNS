<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\User;
use App\Post;
use App\Models\Follow;


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

}
