<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'name', 'type', 'extension','user_id'
    ];
    public  function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query,$name)
    {
        return $query->where('name','LIKE',"%$name%");   
    }

}
