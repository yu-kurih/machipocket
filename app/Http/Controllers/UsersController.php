<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {
        $data = Event::all();
        return view('users.home',['data'=>$data]);
    }
    
    public function show($id)
    {
        $event = Event::find($id);
        $scheduled_data = \Auth::user()->scheduledevents()->where('event_id', $id)->exists();
        $cancelled_data = \Auth::user()->scheduledevents()->where('event_id', $id)->where('deleted_flag', 1)->exists();
        
        $counter = $event->scheduleduser()->where('event_id',$id)->where('deleted_flag',0)->count();
        
        return view('users.show',['eventdata'=>$event,'scheduled_data'=>$scheduled_data,'cancelled_data'=>$cancelled_data,'counter'=>$counter
        ]);
    }
    
    public function store($id)
    {
    
    DB::beginTransaction();
        try {
        
            //既に応募しているかどうか
            $user = \Auth::user();
            $exist = $user->scheduledevents()->where('event_id', $id)->exists();        
            
            if($exist){
                return back();
            }else{
                \Auth::user()->schedule($id);
                DB::commit();
                return back();
            }
            
        }catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
    
    public function destroy($id)
    {
        //既にキャンセルしているかどうか
        $user = \Auth::user();
        $exist = $user->scheduledevents()->where('event_id', $id)->where('deleted_flag', 1)->exists();
        
        if($exist){
            //応募し直し
            \Auth::user()->uncancel($id);
            return back();
        }else{
            \Auth::user()->cancel($id);
            return back();    
        }
    }
    
    //参加予定のイベント情報の取得
    public function userschedule()
    {
        $userId = \Auth::user()->id;
        $user = \Auth::user();
        $data = $user->scheduledevents()->where('user_id',$userId)->where('deleted_flag',0)->get(); 
        $counter = $user->scheduledevents()->where('user_id',$userId)->where('deleted_flag',0)->count(); 
        return view('users.scheduled',['data'=>$data,'counter'=>$counter]);
    }    
    
    
}
