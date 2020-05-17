@extends('layouts.app')

@section('content')
    <div class="container">
      <h1 class="text-center">ユーザホーム</h1>
      
        <div class="row justify-content-center">  
        <div class="col-md-4 mt-4">
          <div class="card bg-info">
            <div class="card-body">
              <h5 class="card-title text-white">イベント一覧</h5>
              <p class="card-text text-white">現在募集しているイベントを一覧で確認できます。</p>
              {!! link_to_route('user.scheduled', '参加予定のイベント確認', [], ['class' => 'btn btn-warning']) !!}</li>
            </div>
          </div>
        </div>
        </div>
        
        </div>
        
        <div class = "text-center mt-4">
          <h5>イベント一覧</h5>
        
        <div class="container">
          <div class="row justify-content-center">
          @foreach($data as $eventdata)
        
            <div class="card m-4" style="width: 18rem;">
              <img src="/images/{{$eventdata->image}}" alt="サムネイル" class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text class="text-danger"  x="50%" y="50%" fill="#dee2e6" dy=".3em">@if(date($eventdata->deadlinedate.' '.$eventdata->deadlinetime) < date("Y-m-d H:i:s"))【申込は締め切りました】 @else 応募締め切り{{ date('Y年m月d日',strtotime($eventdata->deadlinedate))}}まで @endif</text></svg>
                 <div class="card-body">
                    <h5 class="card-title">{{ $eventdata->title }}</h5>
                    <p class="card-text text-left">{{ $eventdata->content }}</p>
                    
                    {!! link_to_route('userevents.show', '内容詳細', ['id' => $eventdata->id], ['class' => 'btn btn-primary']) !!}
            
                 </div>
            </div>
            
          @endforeach
          </div>
        </div>

    </div>

@endsection