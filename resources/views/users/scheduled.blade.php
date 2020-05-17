@extends('layouts.app')
@section('content')

     <div class = "row justify-content-center">
       
      @if($counter==0)
        <h5>参加予定のイベントはまだありません。</h5>
      @else
      
         <table class="table table-bordered  col-8 mt-4 mb-4">
          <thead class="bg-info text-white">
              
            <tr>
              <th scope="col">参加予定イベント</th>
              <th scope="col">日時</th>
              <th scope="col">場所</th>
            </tr>
          </thead>
          
        @foreach($data as $scdata)
          <tbody>
            <tr>
              <td>{!! link_to_route('userevents.show', $scdata->title, ['id'=>$scdata->id], ['class' => 'nav-link']) !!}</td>
              <td>{{ $scdata->date.$scdata->time }}</td>
              <td>{{ $scdata->place}}</td>
            </tr>
          </tbody>
        @endforeach
        
         </table> 
      @endif
      </div>
      
    <div class = "row justify-content-center">
      {!! link_to_route('user.home','ユーザホームへ戻る',['class' => 'mt-4']) !!}
    </div>  
      
@endsection
