<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

 public function index(Request $request) {
      $users = $request->input('users');

      $query = User::query();

       if(!empty($users))
  {
    $query->where('username','like','%'.$users.'%');
  }
  $users = $query->orderBy('username','desc')->paginate(20);
    return view('users.search')->with('users', $users);
    }

}
