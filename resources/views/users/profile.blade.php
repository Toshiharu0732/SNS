@extends('layouts.login')

@section('content')

  <!--テスト-->
<form method="post" action="/profile">
  @csrf
 <h1>プロフィール編集</h1>
   <p>user name</p>
  <input name="username" value="{{$user->username}}" />
   <p>mail adress</p>
    <input name="mail" value="{{$user->mail}}" />
   <p>password</p>
   <input name="password" value="{{$user->password}}" />
  <p>password comfirm</p>
   <input name="password" value="{{$user->password}}" />
   <p>bio</p>
  <input name="bio" value="{{$user->bio}}" />

   <p>icon image</p>

  <button>更新</button>
</form>

 <!--テスト-->



@endsection
