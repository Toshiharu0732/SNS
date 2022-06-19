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
</div>
  <!-- 全ての投稿リスト -->
  @if (count($posts) > 0)
    <div class="card-body">
      <div class="card-body">
        <table class="table table-striped task-table">
        <!-- テーブルヘッダ -->
        <thead>
          <th>投稿一覧</th>
          <th> </th>
        </thead>
        <!-- テーブル本体 -->
        <tbody>
          @foreach ($posts as $post)
            <tr>
              <!-- 投稿詳細 -->
              <td class="table-text">
                <div>{{ $post->post}}</div>
                 <div class="card-body">
                   <form action="{{ url('edit') }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('POST')
                                @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">
                                  編集
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
              </td>
        @endforeach
     </tbody>
    </table>
  </div>
</div>
@endif
@endsection
