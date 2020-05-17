@extends('layouts.admin_app')

@section('content')

    <h4 class="text-center">{{$eventdata->title}}</h1>

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
              <td> {{date('Y年m月d日',strtotime($eventdata->deadlinedate)).date('H時i分s秒',strtotime($eventdata->deadlinetime))}}</td>
            </tr>
              
          </tbody>
        </table>        

            <div class = "d-flex justify-content-center">
            {!! link_to_route('events.edit', '変更', ['id' => $eventdata->id], ['class' => 'btn btn-primary mr-4']) !!}
            
            {!! Form::model($eventdata, ['route' => ['events.destroy', $eventdata->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection