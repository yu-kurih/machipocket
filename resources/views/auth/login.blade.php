@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>ユーザログイン</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'userlogin.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Log in', ['class' => 'btn btn-success btn-block']) !!}
            {!! Form::close() !!}

            <p class="mt-2">まだ登録していない場合は {!! link_to_route('signup.get', 'こちら') !!}</p>
        </div>
    </div>
@endsection