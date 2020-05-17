@extends('layouts.admin_app')

@section('content')

    <h1 class="d-flex justify-content-center">イベント情報新規登録ページ</h1>

    <div class="d-flex justify-content-center">
        <div class="col-6 mt-4 mb-4">
            
                {!! Form::open(['route' => 'events.store','files' => true]) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'イベントタイトル') !!}
                        {!! Form::text('title','', ['class' => 'form-control mb-3']) !!}
                        
                        {!! Form::label('date', '日にち') !!}
                        {!! Form::text('date','', ['class' => 'form-control mb-3']) !!}
                        
                        {!! Form::label('time', '時間') !!}
                        {!! Form::text('time','', ['class' => 'form-control mb-3']) !!} 
                        
                        {!! Form::label('place', '場所') !!}
                        {!! Form::text('place','', ['class' => 'form-control mb-3']) !!}
                        
                        {!! Form::label('contet', '内容') !!}
                        {!! Form::textarea('content','', ['class' => 'form-control mb-3']) !!}
                        
                        {!! Form::label('capacity', '定員') !!}
                        {!! Form::text('capacity','', ['class' => 'form-control mb-3']) !!}
                        
                        <label for="date">申込締め切り（日にち）</label>
                        <input type="date" name='deadlinedate' class='form-control mb-3'>
                        
                        <label for="date">申込締め切り（時間）</label>
                        <input type="time" name='deadlinetime' class='form-control mb-3'>                    
                        
                        {!! Form::label('image', 'サムネイル用画像') !!}
                        {!! Form::file('image',['class' => 'form-control-file mb-3']) !!}
                        
                        
                        {!! Form::label('situation', '追加情報') !!}
                        {!! Form::text('situation','', ['class' => 'form-control mb-3']) !!}
                    </div>
                    
                    {!! Form::submit('登録する', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
        </div>
    </div>
@endsection