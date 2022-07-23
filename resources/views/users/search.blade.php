@extends('layouts.login')

@section('content')

<div class="search-aria">
  <form action="{{ url('/search')}}" method="post" class="search-top">
      {{ csrf_field()}}
      {{method_field('get')}}
      <input type="text" placeholder="ユーザー名" name="name" class="search-box">
      <input type="image" img src="{{ asset( 'images/スクリーンショット 2022-07-18 22.27.44.png') }}" width="45" height="45" class="search-btn">
       <div class="search-word">検索ワード：{{ session('name') }}</div>
   </form>
   </div>
  <div class="search-wrap">
     <div class="search-content">
  @foreach($users as $user)
    @if($user->id != Auth::user()->id)
    <div class="search-list">
    <img src="{{ asset('storage/images/'. $user->images) }}"width="50" height="50" >
      <div class="search-name"> {{$user->username}}</div>
      @endif
      @if ($user->id != Auth::user()->id)
      @if (Auth::user()->isFollowing($user->id))
      <a href="/search/{{$user->id}}/unfollow" class="unfollow">フォロー解除</a>
      @else
      <a href="/search/{{$user->id}}/follow" class="follow">フォローする</a>
      @endif
      @endif
       </div>
    @endforeach
    </div>
</div>

@endsection
