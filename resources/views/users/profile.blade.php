@extends('layouts.login')

@section('content')

@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach


<form method="post" action="/profile" enctype='multipart/form-data'>
  @csrf
 <h1>プロフィール編集</h1>
   <p>user name</p>
  <input name="username" value="{{$user->username}}" />
   <p>mail adress</p>
    <input name="mail" value="{{$user->mail}}" />
   <p>password</p>
   <input type="password" name="password"  />
  <p>password comfirm</p>
   <input  type="password" name="password_confirmation"/>
   <p>bio</p>
  <input name="bio" value="{{$user->bio}}" />

   <p>icon image</p>
  <img src="{{ asset('storage/images/'. Auth::user()->images) }}">
  <input  type="file"  name="images" onchange="previewImage(this);">
<p>
  <button>更新</button>
</p>
</form>





@endsection
