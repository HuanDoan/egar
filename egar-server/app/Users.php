<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $table = 'users';

    public function created_store(){
        return $this->hasMany('App\Store');
    }

    public function created_post(){
        return $this->hasMany('App\Post');
    }

    public function rating(){
        return $this->hasOne('App\Rating');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }

    public function permission(){
        return $this->belongsTo('App\Roles', 'role', 'id');
    }
}
