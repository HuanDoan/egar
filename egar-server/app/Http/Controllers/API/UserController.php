<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Users;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;

class UserController extends Controller
{   
    private $successStatus  = 200;
    private $errorStatus    = 401;
    private $errMess        = [
        'required'      => ':attribute không được để trống!',
        'unique'        => ':attribute đã tồn tại trong hệ thống!',
        'email'         => ':attribute không phải là địa chỉ email hợp lệ!',
        'same'          => ':attribute không khớp với :other!',
        'max'           => ':attribute tối đa :max ký tự',
    ];
    
    public function getUserByEmail($email){
        $user = User::where('email', $email)->get();
        return response()->json(['success'=>$user], $this->successStatus);
    }

    public function getUserByUsername($username){
        $user = User::where('email', $email)->get();
        return response()->json(['success'=>$username], $this->successStatus);
    }

    public function update(Request $request){
        $user_id = $request->user()->id;

        $validator = Validator::make($request->all(), [
            'username'          => 'nullable|unique:users|max:191',
            'email'             => 'nullable|unique:users|email',
            'new_password'      => 'nullable|max:191',
            'confirm_password'  => 'nullable|same:new_password',
            'fullname'          => 'nullable|max:191',
            'phone'             => 'nullable|max:191',
        ], $this->errMess);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], $this->errorStatus);
        }

        $data = $request->all();

        if(isset($data['new_password']) && $data['new_password']!=NULL){
            $data['password'] = bcrypt($data['new_password']);
        }

        $user = User::where('id', $user_id)->update($data);

        return response()->json(['success'], $this->successStatus);
    }
}