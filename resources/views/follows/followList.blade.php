@extends('layouts.login')

@section('content')
    <div>
        <div >
            <div>
                <div class="list-images">
                  @foreach ($users as $post)
                          <a href="{{ url('users/' .$post->id)
                                 }}" class="text-secondary"> <img src="{{ asset('storage/images/'. $post->images) }}" class="rounded-circle" width="50" height="50"></a>
                  @endforeach
                </div>
                @foreach ($posts as $post)
                    <div class="post-block">

                            <a href="{{ url('users/' .$post->user->id)
                                 }}" class="text-secondary"> <img src="{{ asset('storage/images/'. $post->user->images) }}" class="rounded-circle" width="50" height="50"></a>
                                  <div class="post-content">

                                <div class="post-name">{{ $post->user->username }}</div>
                                {{ $post->post }}</div>
                                 <div>{{ $post->created_at}}</div>
                                </div>
                    </?div>
                @endforeach
         </div>
     </div>
   </div>
 </div>
@endsection
