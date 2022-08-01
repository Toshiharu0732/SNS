@extends('layouts.login')

@section('content')

@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach

      <div class="user-pro-aria">
        <img src="{{ asset('storage/images/'. $user->images) }}" class="rounded-circle" width="50" height="50"></a>
        <div class="user-pro-wrap">
          <div class="user-name">name
  <p class="user-auth-name">{{ $user->username }}</p></div>
    <div class="user-bio">bio
  <p class="user-auth-bio">{{ $user->bio }}</p></div>
</div>
    @if ($user->id != Auth::user()->id)
                                 @if (Auth::user()->isFollowing($user->id))
                                 <a href="/search/{{$user->id}}/unfollow" class="unfollow">フォロー解除</a>
                                  @else
                                 <a href="/search/{{$user->id}}/follow" class="follow">フォローする</a>
                                 @endif
                                 @endif
   </div>

  @csrf
  @foreach ($posts as $post)
                    <div class="post-block">
                       <img src="{{ asset('storage/images/'. $post->user->images) }}" class="rounded-circle" width="50" height="50"></a>
                       <div class="post-content">
                                <div class="post-name">{{ $post->user->username }}</div>
                                <div>{{ $post->post }}</div>
                                 </div>
                                 <div>{{ $post->created_at}}</div>
                    </div>
                @endforeach
@endsection
