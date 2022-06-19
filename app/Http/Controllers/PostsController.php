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

        $post = Post::get();

        return view('posts'['posts'=>$posts]);
    }
}
