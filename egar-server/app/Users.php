<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $table = 'users';
    protected $hidden = ['id', 'password', 'remember_token'];

    public function created_store(){
        return $this->hasMany('App\Store', 'created_by', 'id');
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
