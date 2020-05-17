<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    //多対多
    public function scheduledevents()
    {
        return $this->belongsToMany(Event::class,'scheduled','user_id','event_id')->withTimestamps();
    }   
    
    //応募する
    public function schedule($eventId)
    {
            $this->scheduledevents()->attach($eventId);
    }
    
    //キャンセル
    public function cancel($eventId)
    {
            $this->scheduledevents()->updateExistingPivot($eventId, ['deleted_flag'=> 1]);

    }
    
    //応募し直し
    public function uncancel($eventId)
    {
            $this->scheduledevents()->detach($eventId);
            $this->scheduledevents()->attach($eventId);

    }    
    
    
}
