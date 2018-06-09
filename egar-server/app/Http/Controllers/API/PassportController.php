<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Users;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PassportController extends Controller
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

    /**
     * Create new user
     *
     * @param  Request  $request
     * @return Response
     */
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'username'          => 'required|unique:users|max:191',
            'email'             => 'required|unique:users|email',
            'password'          => 'required|max:191',
            'confirm_password'  => 'required|same:password',
            'fullname'          => 'required|max:191',
            'phone'             => 'max:191',
        ], $this->errMess);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], $this->errorStatus);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['role']  = 4;
        $input['status'] = 1;
        $input['avatar'] = '';

        $user = User::create($input);

        $success['username']    = $user->username;
        $success['email']       = $user->email;
        return response()->json(['success'=>$success], $this->successStatus);
    }

    public function logout(Request $request){
        $request->user()->token()->revoke();
        $request->user()->token()->delete();
        return response()->json(['success'=> 'Log out successful!'], $this->successStatus);
    }

    public function logoutAll(Request $request){
        $request->user()->AauthAcessToken()->delete();

        return response()->json(['success'=> 'Completed!'], $this->successStatus);
    }
}