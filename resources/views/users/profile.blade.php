@extends('layouts.login')

@section('content')
   <div class="card w-50 mx-auto m-5">
        <div class="card-body">
            <div class="pt-2">
                <p class="h3 border-bottom border-secondary pb-3">プロフィール編集</p>
            </div>
            <div class="m-3">
                <div class="form-group pt-1">
                     <p>user name</p>
                      <input type="text" name="post" class="form-control"
          placeholder="{{$user->username}}">
                    <span class="text-danger"></span>
                </div>
                <div class="form-group pt-2">
                  <p>mail adress</p>
                   <input type="text" name="post" class="form-control"
          placeholder="{{$user->mail}}">
                    <span class="text-danger"></span>
                </div>
                <div class="form-group pt-2">
                    <p>password</p>
                    <div class="row g-3">
                        <div class="col-md-2">
                           <input type="text" name="post" class="form-control"
          placeholder="{{$user->password}}">
                        </div>
                        <p>password comfirm</p>
                    <div class="row g-3">
                        <div class="col-md-2">
                           <input type="text" name="post" class="form-control"
          placeholder="{{$user->password}}">
                        </div>
                    </div>
                     <p>bio</p>
                    <div class="row g-3">
                        <div class="col-md-2">
                           <input type="text" name="post" class="form-control"
          placeholder="{{$user->bio}}">
                        </div>
                    </div>
                     <p>icon image</p>
                </div>
                <div class="form-group pull-right">
                    {{Form::submit(' 更新 ', ['class'=>'btn btn-success rounded-pill'])}}
                </div>
            </div>
        </div>
    </div>


@endsection
