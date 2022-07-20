@extends('layouts.login')

@section('content')
@if( Auth::check() )
 @include('posts.errors')
<form action="{{ url('posts') }}" method="POST" class="form-horizontal">
   {{ csrf_field() }}
      <!-- 投稿の本文 -->
        <div class="post-aria">
          <img src="{{asset('storage/images/'. Auth::user()->images)}}"width="50" height="50" >
          <div>
          <input type="text" name="post" class="post-content-aria"
          placeholder="投稿内容を登録してください">
         </div>
      <!--　登録ボタン -->
      <input type="image" img src="{{ asset( 'images/post.png') }}" width="100" height="100">
        </div >
    </form>
  @endif
  <!-- 全ての投稿リスト -->
  @if (count($posts) > 0)
    <div class="card-body">
      <div class="card-body">
        <table class="table post">

        <!-- テーブル本体 -->
        <tbody>
          @foreach ($posts as $post)
            <li class="post-block">
              <figure><img src="{{ asset('storage/images/'. $post->user->images) }}"width="50" height="50" ></figure>
              <!-- 投稿詳細 -->
              <div class="post-content">
                  <div>
                     <div class="post-name">{{ $post->user->username }}</div>
                    <div>{{ $post->created_at}}</div>
                  </div>
                  <div>{{ $post->post}}</div>
                   <div>
                    <div></div>
                      <div>
                        <!-- 投稿の編集ボタン -->
                        @if($post->user_id == Auth::user()->id)
                       <a class="js-modal-open"  post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="{{ asset( 'images/edit.png') }}" width="40" height="40"></a>
                       <!-- 削除 -->
                        <a class="btn btn-danger" href="/top/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="{{ asset( 'images/trash.png') }}" width="40" height="40"></a>
                          @endif
                    </div>
                </div>
              </div>
                  </li>
                <!-- 編集（モーダル） -->
                   <div class="modal js-modal">
                   <div class="modal__bg js-modal-close"></div>
                    <div class="modal__content">
                   <form action="/update" method="POST">
                    @csrf
                        <textarea name="text" class="modal_post">{{ $post->post }}</textarea>
                        <input type="hidden" name="id" class="modal_id" value="{{ $post->id }}">
                  <input type="image" img src="{{ asset( 'images/edit.png') }}" width="25" height="25">
                  </form>
                  <a class="js-modal-close" href=""></a>
                   </div>
                   </div>
                  @endforeach
     </tbody>
    </table>
  </div>
</div>
</div>
@endif
@endsection
