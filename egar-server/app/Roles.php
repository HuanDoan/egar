<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
    protected $table = 'user_roles_vocabulary';

    public function get_users(){
        return $this->hasMany('App\Users', 'role', 'id');
    }
}
