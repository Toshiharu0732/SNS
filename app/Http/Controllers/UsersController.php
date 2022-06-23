<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }


 public function search(Request $request) {

      $users = Request::get('name');

      $request = User::query();

       if(!empty($users))
  {
    $request->where('username','like','%'.$users.'%');
  }
  $users = $request->orderBy('username','desc')->paginate(20);
    return view('users.search')->with('users', $users);
    }

}
