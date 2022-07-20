@extends('layouts.login')

@section('content')
<form action="{{ url('/search')}}" method="post">
  {{ csrf_field()}}
  {{method_field('get')}}
    <div class="search-images">
      <input type="text" class="form-control col-md-5" placeholder="ユーザー名" name="name">
      <input type="image" img src="{{ asset( 'images/スクリーンショット 2022-07-18 22.27.44.png') }}" width="40" height="40">
       <p>検索ワード：{{ session('name') }}</p>
      </div>
 </form>
 <div style="search-list">
  <table class="">
  @foreach($users as $user)
  <tr>
    @if($user->id != Auth::user()->id)
    <td><img src="{{ asset('storage/images/'. $user->images) }}"width="50" height="50" >
      <div>{{$user->username}}</div>
      @endif
      @if ($user->id != Auth::user()->id)
      @if (Auth::user()->isFollowing($user->id))
      <a href="/search/{{$user->id}}/unfollow" class="unfollow">フォロー解除</a>
      @else
      <a href="/search/{{$user->id}}/follow" class="follow">フォローする</a>
      @endif
      @endif
    @endforeach
      </td>
  </tr>
</table>
</div>
@endsection
