@extends('layouts.login')

@section('content')
 <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                 @foreach ($users as $post)
                   <img src="{{ asset('storage/images/'. $post) }}" class="rounded-circle" width="50" height="50">
                 @endforeach
                @foreach ($posts as $post)
                    <div class="card">
                        <div class="card-haeder p-3 w-100 d-flex">
                            <a href="{{ url('users/' .$post->user->id)
                                 }}" class="text-secondary">
                                <img src="{{ asset('storage/images/'. $post->user->images) }}" class="rounded-circle" width="50" height="50"></a>
                            <div class="ml-2 d-flex flex-column">
                                <p>{{ $post->user->username }}</p>
                                <textarea name="text" class="">{{ $post->post }}</textarea>
                                 <div>{{ $post->created_at}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
 </div>

@endsection
