<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    public function album(){
        return $this->belongsTo("App\Album");
    }
    public function artist(){
        return $this->belongsTo('App\Artist');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
