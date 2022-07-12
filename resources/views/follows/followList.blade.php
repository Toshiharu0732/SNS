@extends('layouts.login')

@section('content')
 <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                  @foreach ($users as $post)
                   <div class="card-haeder p-3 w-100 d-flex">
                            <img src="{{ asset('storage/images/'. $post) }}" class="rounded-circle" width="50" height="50">
                    </div>
                  @endforeach
                @foreach ($posts as $post)
                    <div class="card">
                        <div class="card-haeder p-3 w-100 d-flex">
                            <img src="{{ asset('storage/images/'. $post->user->images) }}" class="rounded-circle" width="50" height="50">
                            <div class="ml-2 d-flex flex-column">
                                <a href="{{ url('users/' .$post->user->id)
                                 }}" class="text-secondary">{{ $post->user->username }}</a>
                                <textarea name="text" class="modal_post">{{ $post->post }}</textarea>
                                 <div>{{ $post->created_at}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="my-4 d-flex justify-content-center">
        </div>
    </div>

@endsection
