@extends('layouts.app')

@section('content')
  @if(Auth::check())
    <div class="text-center">
      {!! link_to_route('user.home', 'ユーザホームへ移動', [], ['class' => 'btn btn-lg btn-success']) !!}
    <div>  
  @else
    <div class="text-center">
      <img src="/images/machipocket.png" alt="machipocket" class="img-fluid rounded mb-4"></br>
      {!! link_to_route('signup.get', '登録する', [], ['class' => 'btn btn-lg btn-success']) !!}
    </div>
  @endif
@endsection