@extends('layouts.login')

@section('content')
<form action="{{ url('/search')}}" method="post">
  {{ csrf_field()}}
  {{method_field('get')}}
  <div class="form-group">
    <input type="text" class="form-control col-md-5" placeholder="ユーザー名" name="name">
  </div>
 <button type="submit" class="btn btn-primary col-md-5">検索</button>
 </form>
 <div style="margin-top:50px;">

  <table class="table">
  @foreach($users as $user)
  <tr>
    <td>{{$user->username}}
      @if ($user->id != Auth::user()->id)
      @if (Auth::user()->isFollowing($user->id))
      <a href="/search/{{$user->id}}/unfollow" class="unfollow">フォロー解除</a>
      @else
      <a href="/search/{{$user->id}}/follow" class="follow">フォローする</a>
      @endif
      @endif
    </td>
  </tr>
@endforeach
</table>
</div>
@endsection
