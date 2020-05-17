@extends('layouts.app')

@section('content')

    <h4 class="text-center">{{$eventdata->title}}</h4>

    <div class="d-flex justify-content-center">
        <div class="col-6 mt-4">

        <table class="table table-bordered">
          <tbody>
            <tr>
              <th scope="row" class="table-success">日時</th>
              <td>{{ $eventdata->date.'&ensp;'.$eventdata->time }}</td>
            </tr>
            <tr>
              <th scope="row" class="table-success">場所</th>
              <td>{{ $eventdata->place}}</td>
            </tr>
            <tr>
              <th scope="row" class="table-success">内容</th>
              <td>{{ $eventdata->content }}</td>
            </tr>
            <tr>
              <th scope="row" class="table-success">定員</th>
              <td>{{ $eventdata->capacity}}人</td>
            </tr>
            <tr>
              <th scope="row" class="table-success">申込締め切り</th>
              <td>{{date('Y年m月d日',strtotime($eventdata->deadlinedate)).date('H時i分s秒',strtotime($eventdata->deadlinetime))}}</td>
            </tr>
              
          </tbody>
        </table>
        
          <div class = "d-flex justify-content-center">

        @if($counter==$eventdata->capacity)
          <h5>定員に達したため募集は終了しました。</h5>
        @else

          @if($cancelled_data==true)
                  {!! Form::open(['route' => ['usercancel', $eventdata->id],'method' => 'delete']) !!}
                    {!! Form::submit('応募し直す', ['class' => "btn btn-warning btn-block"]) !!}
                  {!! Form::close() !!}
          @else
              @if($scheduled_data==true)
                  {!! Form::open(['route' => ['usercancel', $eventdata->id],'method' => 'delete']) !!}
                    {!! Form::submit('キャンセルする', ['class' => "btn btn-danger btn-block"]) !!}
                  {!! Form::close() !!}
              @else
                  {!! Form::open(['route' => ['userschedule', $eventdata->id]]) !!}
                    {!! Form::submit('応募する', ['class' => "btn btn-success btn-block"]) !!}
                  {!! Form::close() !!}
              @endif
          @endif    
        
        @endif
          
          
          
          </div>
        
        </div>
        
    </div>
@endsection