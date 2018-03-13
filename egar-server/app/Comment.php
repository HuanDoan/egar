<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comment';

    public function comment_by(){
        return $this->belongsTo('App\Users');
    }

    public function post(){
        return $this->belongsTo('App\Post');
    }

    public function parent(){
        return $this->hasOne('Comment', 'parent');
    }
}
