@extends('layouts.admin_app')

@section('content')

    <h1 class="d-flex justify-content-center">イベント情報更新ページ</h1>

    <div class="d-flex justify-content-center">
        <div class="col-6 mt-4 mb-4">
            
             {!! Form::model($eventdata, ['route' => ['events.update', $eventdata->id], 'files' => true ,'method' => 'put']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'イベントタイトル') !!}
                        {!! Form::text('title',null, ['class' => 'form-control mb-3']) !!}
                        
                        {!! Form::label('date', '日にち') !!}
                        {!! Form::text('date',null, ['class' => 'form-control mb-3']) !!}
                        
                        {!! Form::label('time', '時間') !!}
                        {!! Form::text('time',null, ['class' => 'form-control mb-3']) !!} 
                        
                        {!! Form::label('place', '場所') !!}
                        {!! Form::text('place',null, ['class' => 'form-control mb-3']) !!}
                        
                        {!! Form::label('contet', '内容') !!}
                        {!! Form::textarea('content',null, ['class' => 'form-control mb-3']) !!}
                        
                        {!! Form::label('capacity', '定員') !!}
                        {!! Form::text('capacity',null, ['class' => 'form-control mb-3']) !!}
                        
                        <label>申込締め切り（日にち）</label>
                        <input type="date" name='deadlinedate' class='form-control mb-3' value='{{ old('deadlinedate',$eventdata->deadlinedate) }}'>
                        
                        <label>申込締め切り（時間）</label>
                        <input type="time" name='deadlinetime' class='form-control mb-3' value='{{ old('deadlinetime',$eventdata->deadlinetime) }}'>                        
                
                        {!! Form::label('image', 'サムネイル用画像') !!}
                        {!! Form::file('image',['class' => 'form-control-file mb-3']) !!}
          
                        {!! Form::label('situation', '追加情報') !!}
                        {!! Form::text('situation',null, ['class' => 'form-control mb-3']) !!}
                        
                    </div>
                    
                    {!! Form::submit('更新する', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}

        </div>
    </div>
@endsection