@extends('layouts.login')

@section('content')
@if( Auth::check() )
 @include('posts.errors')
<form action="{{ url('posts') }}" method="POST" class="form-horizontal">
   {{ csrf_field() }}
      <!-- 投稿の本文 -->
        <div class="col-sm-6">
          <input type="text" name="post" class="form-control"
          placeholder="投稿内容を登録してください">
        </div>
      <!--　登録ボタン -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-primary">
            投稿
          </button>
        </div>
      </div>
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
            <tr>
              <!-- 投稿詳細 -->
              <td class="post-text">
                <div>{{ $post->post}}</div>

  <div class="content">
        <!-- 投稿の編集ボタン -->
        <a class="js-modal-open"  post="{{ $post->post }}" post_id="{{ $post->id }}">編集</a>
    </div>

<!-- 編集（モーダル） -->
     <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="/update" method="POST">
            @csrf
                <textarea name="text" class="modal_post">{{ $post->post }}</textarea>
                <input type="hidden" name="id" class="modal_id" value="{{ $post->id }}">
                <input type="submit" value="更新">
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>

<!-- 削除 -->
              <td><a class="btn btn-danger" href="/top/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
        @endforeach
     </tbody>
    </table>
  </div>
</div>
</div>
@endif
<!-- 検索 -->
<form method="get" action="/search">
    <div>
        <button type="submit">ユーザー検索</button>
    </div>
</form>



@endsection
