@extends('layouts.login')

@section('content')

@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach


<form method="post" action="/profile" enctype='multipart/form-data'>
  @csrf

  <div class="profile-top">
      <img src="{{ asset('storage/images/'. Auth::user()->images) }}" width="50" height="50" class="profile-image">
   <p>user name</p>
   <p class="profile-username">
  <input name="username" value="{{$user->username}}" class="font-s"/>
  </p>
  </div>
  <div class="profile-list">
   <p>mail adress</p>
     <p class="profile-adress">
    <input name="mail" value="{{$user->mail}}" class="font-s"/>
    </p>
    </div>
      <div class="profile-list">
   <p>password</p>
     <p class="profile-password">
   <input type="password" name="password"  class="font-s"/>
   </p>
   </div>
      <div class="profile-list">
  <p>password comfirm</p>
    <p class="profile-password-comfirm">
   <input  type="password" name="password_confirmation" class="font-s"/>
   </p>
   </div>
   <div class="profile-list">
   <p>bio</p>
     <p class="profile-bio">
  <input name="bio" value="{{$user->bio}}" class="font-s" />
  </p>
  </div>
 <div class="profile-list">
   <p>icon image</p>
     <p class="profile-username">
  <input  type="file"  name="images" onchange="previewImage(this);" class="profile-file">
</p>

  </div>
<p>
  <button type="submit"  class="button-update">更新</button>
</p>
</form>






@endsection
