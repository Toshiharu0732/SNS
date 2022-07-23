@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach

<h2 class="login-me">新規ユーザー登録</h2>

{{ Form::label('user name') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('mail adress') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::label('password_confirmation') }}
{{ Form::password('password_confirmation',['class' => 'input']) }}

{{ Form::submit('REGISTER',['class' => 'btn-register']) }}

<p><a href="/login" class="com">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
