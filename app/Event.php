<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'admin_id','title','date', 'time',
        'place','content','capacity',
        'deadlinedate','deadlinetime','image',
        'situation'
    ];
    
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    
    public function scheduleduser()
    {
        return $this->belongsToMany(User::class,'scheduled','event_id','user_id')->withTimestamps();
    }
    
}
