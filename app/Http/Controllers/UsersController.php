<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    //
    public function profile(){

      $user = Auth::user();
      $id = Auth::id();

        return view('users.profile',['user'=>$user]);
    }

      //テスト中
      public function update(Request $request)
    {
        $user = Auth::user();
        $user->username = $request->username;
        $user->mail = $request->mail;
        $user->password = $request->password;
        $user->bio = $request->bio;
        $user->update();
        return redirect('/top');//保存後はリダイレクトさせたいページを指定したりする
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
