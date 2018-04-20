<?php

namespace App\Http\Controllers\Web;

use App\User;
use App\Users;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Roles;

class CpanelController extends Controller
{
    private $allow = [1,2];
    private $errMess        = [
        'required'      => ':attribute không được để trống!',
        'unique'        => ':attribute đã tồn tại trong hệ thống!',
        'email'         => ':attribute không phải là địa chỉ email hợp lệ!',
        'same'          => ':attribute không khớp với :other!',
        'max'           => ':attribute tối đa :max ký tự!',
        'min'           => ':attribute ít nhất :min ký tự!',
        'regex'         => ':attribute không được chứa ký tự đặc biệt!',
    ];

    public function dashboard(){
        var_dump(Auth::guard('admin')->user()->role);
    }

    public function login(){
        if (!Auth::guard('admin')->check()) {
            return view('cpanel/login');
        }
        else{
            return redirect()->route('cpanel.dashboard');
        }
    }

    public function post_login(Request $request){
        $attempt = array(
            'username' => $request->username,
            'password' => $request->password,
            'role'    => $this->allow,
        );
        
        if(Auth::guard('admin')->attempt($attempt)){
            return redirect()->route('cpanel.dashboard');
        }

        $request->session()->flash('login-error', 'Sai tên đăng nhập hay mật khẩu!');
        return redirect()->back();
    }

    public function logout(){
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }

        return redirect()->route('auth.admin.login');
    }

    public function get_users(){
        $users = Users::all();
        return view('cpanel/pages/users', compact('users'));
    }

    public function get_add_users(){
        $roles = Roles::all();

        return view('cpanel/pages/users_add', compact('roles'));
    }

    public function post_add_users(Request $request){
        $validator = Validator::make($request->all(), [
            'username'          => ["required","unique:users","max:191","regex:/(^([a-zA-Z]+)(\d+)?$)/u"],
            'password'          => 'required|max:191|min:8',
            'confirm-password'  => 'required|same:password|max:191|min:8',
            'email'             => 'required|unique:users|email',
            'fullname'          => 'max:191',
            'phone'             => 'max:191',
        ], $this->errMess);

        if ($validator->fails()) {
            return redirect()->route('cpanel.get.add.users')
                        ->withErrors($validator)
                        ->withInput($request->input());
        }

        return redirect()->back()->with('addsuccess', 'success');
    }
}