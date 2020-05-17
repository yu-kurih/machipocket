@extends('layouts.admin_app')

@section('content')

    <h1 class = "text-center">予約状況の確認</h1>
    
    @if($counter<$eventdata->capacity)
        <h4 class = "text-center mt-4"> 応募人数&ensp;{{ $counter }}人&ensp;/&ensp;定員&ensp;{{ $eventdata->capacity }}人</h4>
    @else
        <h4 class = "text-center mt-4"> 定員に達しました</h4>
    @endif

    <div class="d-flex justify-content-center">

         <table class="table table-bordered  col-8 mt-4 mb-4">
          <thead class="bg-info text-white">
              
            <tr>
              <th scope="col">応募ユーザ名</th>
              <th scope="col">メールアドレス</th>
            </tr>
          </thead>
          
        @foreach($uscdata as $uscdata)
          <tbody>
            <tr>
              <td>{{ $uscdata->name }}</td>
              <td>{{ $uscdata->email }}</td>
            </tr>
          </tbody>
        @endforeach
        
         </table> 

    </div>
    
@endsection