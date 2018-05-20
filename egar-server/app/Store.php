<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //
    protected $table = 'store';
    protected $fillable = ['name', 'lat', 'lng', 'created_by', 'address', 'phone', 'rate', 'description', 'avatar', 'status'];
    protected $hidden = ['id'];

    public function createdBy(){
        return $this->belongsTo('App\Users', 'created_by', 'id');
    }

    public function rating(){
        return $this->hasMany('App\Rating');
    }
}
