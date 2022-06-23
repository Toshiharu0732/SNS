@extends('layouts.login')

@section('content')
<h1>検索条件を入力してください</h1>
<form action="{{ url('/search')}}" method="post">
  {{ csrf_field()}}
  {{method_field('get')}}
  <div class="form-group">
    <label>名前</label>
    <input type="text" class="form-control col-md-5" placeholder="検索したい名前を入力してください" name="name">
  </div>
 <button type="submit" class="btn btn-primary col-md-5">検索</button>
 </form>
 <div style="margin-top:50px;">
<h1>ユーザー一覧</h1>
<table class="table">
  <tr>
    <th>ユーザー名</th>
  </tr>
  @foreach($users as $user)
  <tr>
    <td>{{$user->username}}</td>
  </tr>
@endforeach
</table>
</div>
@endsection
