<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'post';

    public function created_by(){
        return $this->belongsTo('App\Users');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }
}
