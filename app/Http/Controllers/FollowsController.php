<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\User;
use App\Post;
use App\Models\Follow;


class FollowsController extends Controller
{
    //
    public function followList(User $users){
       $users= Post::get();
       $users = User::All();

        return view('follows.followList', [
            'users'  => $users
        ]);
    }

    public function followerList(User $users){
        $users= Post::get();
        return view('follows.followerList', [
            'users'  => $users
        ]);
    }

}
