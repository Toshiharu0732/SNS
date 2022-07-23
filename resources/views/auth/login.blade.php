@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<p class="login-me">AtlasSNSへようこそ</p>


{{ Form::label('mail address') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}
{{ Form::submit ('ログイン',['class' => 'btn-login']) }}


<p><a href="/register" class="com">新規ユーザーの方はこちら</a></p>



{!! Form::close() !!}

@endsection
