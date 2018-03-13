<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
    protected $table = 'rating';

    public function rated_by(){
        return $this->hasOne('App\Users');
    }

    public function rating_for(){
        return $this->belongsTo('App\Store');
    }
}
