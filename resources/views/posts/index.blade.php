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

    <!-- 編集（モーダル） -->
 <div class="edit-modal editModal-{{ $post->id }}">
        <div class="modal-content">
            <h2>投稿編集</h2>
            <form method="POST" enctype="multipart/form-data" action="{{ url('/top') }}/{{$post->id}}">
                @csrf
                <textarea name="text" cols="30" rows="2"></textarea>
                {{ $post->id }}
                <div class="line-right">
                    <!-- モーダルを閉じるボタン(関数名と一致させないとモーダルが閉じません) -->
                    <button type="button" class="left-button" onclick="editModal({{ $post->id }})">キャンセル</button>
                     <!-- 送信ボタン -->
                    <button type="submit" class="right-button" onclick="editModal({{ $post->id }})">保存</button>
                </div>
            </form>
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
<form method="GET" action="/search">
    <div>
        <button type="submit">ユーザー検索</button>
    </div>
</form>



@endsection
