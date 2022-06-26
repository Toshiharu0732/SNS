@extends('layouts.login')

@section('content')

@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach

  <!--テスト-->
<form method="post" action="/profile">
  @csrf
 <h1>プロフィール編集</h1>
   <p>user name</p>
  <input name="username" value="{{$user->username}}" />
   <p>mail adress</p>
    <input name="mail" value="{{$user->mail}}" />
   <p>password</p>
   <input type="password" name="password"  />
  <p>password comfirm</p>
   <input  type="password" name="password"/>
   <p>bio</p>
  <input name="bio" value="{{$user->bio}}" />

   <p>icon image</p>
   <img src="{{ asset('images/icon1.png'.auth()->user()->images) }}" >
<p>
  <button>更新</button>
</p>
</form>

 <!--テスト-->



@endsection
