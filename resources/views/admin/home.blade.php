@extends('layouts.admin_app')

@section('content')
    <div class="container">
      <h1 class="text-center">管理者ホーム</h1>
      
      <div class="row justify-content-center">
        
        <div class="col-md-4 mt-4">
          <div class="card bg-warning">
            <div class="card-body">
              <h5 class="card-title">イベント情報新規登録</h5>
              <p class="card-text">申込みを募集するイベントの情報を登録します。</p>
              {!! link_to_route('events.create', '新規メッセージの投稿', [], ['class' => 'btn btn-info']) !!}</li>
            </div>
          </div>
        </div>
        
        <div class="col-md-4 mt-4">
          <div class="card">
            <div class="card-body bg-primary">
              <h5 class="card-title text-white">イベント一覧</h5>
              <p class="card-text text-white">現在募集しているイベントを一覧で確認できます。</p>
              {!! link_to_route('events.list', 'イベント一覧へ', [], ['class' => 'btn btn-light']) !!}</li>
            </div>
          </div>
        </div>
        
      </div>

    </div>
@endsection