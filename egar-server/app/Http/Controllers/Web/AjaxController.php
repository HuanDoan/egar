<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AjaxController extends Controller
{
    public function getUserByUsername($username){
        $user = User::where('username', $username)->first();

        return response()->json(['success' => $user], 200);
    }
}
