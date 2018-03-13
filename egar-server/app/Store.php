<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //
    protected $table = 'store';

    public function created_by(){
        return $this->belongsTo('App\Users');
    }

    public function rating(){
        return $this->hasMany('App\Rating');
    }
}
