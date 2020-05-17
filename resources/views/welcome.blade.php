@extends('layouts.app')

@section('content')
  @if(Auth::check())
    {{ Auth::user()->name }}
  @else
    <div class="text-center">
      <img src="/images/machipocket.png" alt="machipocket" class="img-fluid rounded mb-4"></br>
      {!! link_to_route('signup.get', '登録する', [], ['class' => 'btn btn-lg btn-success']) !!}
    </div>
  @endif
@endsection