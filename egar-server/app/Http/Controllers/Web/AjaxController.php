<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Store;

class AjaxController extends Controller
{
    public function getUserByUsername($username){
        $user = User::where('username', $username)->first();

        return response()->json(['success' => $user], 200);
    }

    public function getStoreByStoreId($storeId){
        $store = Store::where('id', $storeId)->get();
        $store[0]->created_by = $store[0]->createdBy->username;

        return response()->json(['success' => $store], 200);
    }
}
