<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Auth;
use Illuminate\Support\Facades\Storage;
use DateTime;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Event::all();
        return view('events.eventslist',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'date' => 'required|max:191',
            'time' => 'required|max:191',
            'place' => 'required|max:191',
            'content' => 'required|max:191',
            'capacity' => 'required|max:191',
            'deadlinedate' => 'required|max:191',
            'deadlinetime' => 'required|max:191',
            'image' => 'required|max:191',            
            'situation' => 'required|max:191',            
        ]);
        
        
        //画像のアップロード
        $imagename = $_FILES['image']['name'];
        $imagetime = date('Ymd_His');
        $store_name = $imagetime.$imagename;
        $imagestore = $request->file('image')->storeAs('images',$store_name,'public_uploads');
        
        //入力されたデータの保存
        $event = new Event;
        $event->admin_id = Auth::id();
        $event->title  = $request->title;
        $event->date   = $request->date;
        $event->time   = $request->time;
        $event->place  = $request->place;
        $event->content= $request->content;
        $event->capacity=$request->capacity;
        $event->deadlinedate=$request->deadlinedate;
        $event->deadlinetime=$request->deadlinetime;
        $event->image = $store_name;
        $event->situation = $request->situation;
        $event->save();

        $last_insert_id = $event->id;
        return redirect()->route('events.show', ['id' => $last_insert_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Event::find($id);
        return view('events.show',['eventdata'=>$data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Event::find($id);
        return view('events.edit',['eventdata'=>$data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'date' => 'required|max:191',
            'time' => 'required|max:191',
            'place' => 'required|max:191',
            'content' => 'required|max:191',
            'capacity' => 'required|max:191',
            'deadlinedate' => 'required|max:191',
            'deadlinetime' => 'required|max:191',
            'situation' => 'required|max:191',            
        ]);


        //更新するデータ
        $event =  Event::find($id);

        $event->admin_id = Auth::id();
        $event->title  = $request->title;
        $event->date   = $request->date;
        $event->time   = $request->time;
        $event->place  = $request->place;
        $event->content= $request->content;
        $event->capacity=$request->capacity;
        $event->deadlinedate=$request->deadlinedate;
        $event->deadlinetime=$request->deadlinetime;
        
        //以前の画像ファイルを削除する
        if(file_exists($request->file('image'))){
            $deleteimagename = $event->image;
            Storage::disk('public_uploads')->delete('images/'.$deleteimagename);
        
            $imagename = $_FILES['image']['name'];
            $imagetime = date('Ymd_His');
            $store_name = $imagetime.$imagename;
            $imagestore = $request->file('image')->storeAs('images',$store_name,'public_uploads');
            $event->image = $store_name;   
        }
        
        $event->situation = $request->situation;
        $event->save();

        return redirect()->route('events.show', ['id' => $id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event =  Event::find($id);
        $deleteimagename = $event->image;
        Storage::disk('public_uploads')->delete('images/'.$deleteimagename);
        $event->delete();

        return redirect()->route('events.list');
    }
    
    
    public function scheduledlist($id)
    {
        $event = Event::find($id);
        $uscdata = $event->scheduleduser()->where('event_id',$id)->where('deleted_flag',0)->get();
        $counter = $event->scheduleduser()->where('event_id',$id)->where('deleted_flag',0)->count();
        return view('events.userlist',[ 'eventdata'=>$event,'uscdata'=>$uscdata,'counter'=>$counter]);        
        
    }
    
}
