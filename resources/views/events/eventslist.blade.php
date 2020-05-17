@extends('layouts.admin_app')

@section('content')

    <h1 class="d-flex justify-content-center">イベント一覧</h1>
    
    <div class="container">
    <div class="row justify-content-center">
    
    @foreach($data as $eventdata)
    
        <div class="card m-4" style="width: 18rem;">
          <img src="/images/{{$eventdata->image}}" alt="サムネイル" class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text class="text-danger"  x="50%" y="50%" fill="#dee2e6" dy=".3em"> @if(date($eventdata->deadlinedate.' '.$eventdata->deadlinetime) < date("Y-m-d H:i:s"))&emsp;【申込は締め切りました】 @else &emsp; 応募締め切り{{ date('Y年m月d日',strtotime($eventdata->deadlinedate))}}まで @endif</text></svg>
             <div class="card-body">
                <h5 class="card-title">{{ $eventdata->title }}</h5>
                
                <p class="card-text">{{ $eventdata->content }}</p>
                
                {!! link_to_route('events.show', '内容詳細', ['id' => $eventdata->id], ['class' => 'btn btn-primary']) !!}
                
                {!! link_to_route('event.user.scheduled', '応募状況確認', ['id' => $eventdata->id], ['class' => 'btn btn-info ml-4']) !!}    

             </div>
        </div>
        
    @endforeach
    
    </div>
    
    <div class="d-flex justify-content-center mb-4">
        {!! link_to_route('admin.home', '管理者ホームへ戻る', ['class' => 'mt-4']) !!}
    </div>
    </div>
    
@endsection