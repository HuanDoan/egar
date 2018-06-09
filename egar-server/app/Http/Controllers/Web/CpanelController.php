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
        echo 'Dashboard';
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
        $roles = Roles::all();
        return view('cpanel/pages/users', compact('users', 'roles'));
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
            'role'              => 'required',
            'status'            => 'required',
            'avatar'            => 'image|max:3072'
        ], $this->errMess);

        if ($validator->fails()) {
            return redirect()->route('cpanel.get.add.users')
                        ->withErrors($validator)
                        ->withInput($request->input());
        }

        if ($request->file('avatar')) {
            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;
            $path = '/uploads/avatar/'.$fileName;
            $uploadPath = public_path('/uploads/avatar');
            $request->file('image')->move($uploadPath, $fileName);
        }
        else{
            $path = '';
        }

        $newUser = $request->all();
        $newUser['password'] = bcrypt($newUser['password']);
        $newUser['avatar'] = $path;

        $user = User::create($newUser);

        return redirect()->route('cpanel.get.users')->with('addsuccess', 'success');
    }

    /**
     * POST update info user
     * @param \Illuminate\Http\Request  $request
     * @param Request string $username
     * 
     * Not have tested yet
     */
    public function updateUser(Request $request){
        if($request->username != $request->current_username){
            $validator = Validator::make($request->all(), [
                'username'          => ["unique:users","max:191","regex:/(^([a-zA-Z]+)(\d+)?$)/u"],
                'password'          => 'nullable|max:191|min:8',
                'confirm_password'  => 'same:password|max:191|min:8',
                'fullname'          => 'max:191',
                'phone'             => 'max:191',
                'avatar'            => 'image|max:3072'
            ], $this->errMess);
        }
        else{
            $validator = Validator::make($request->all(), [
                'password'          => 'nullable|max:191|min:8',
                'confirm_password'  => 'same:password|max:191|min:8',
                'fullname'          => 'max:191',
                'phone'             => 'max:191',
                'avatar'            => 'image|max:3072'
            ], $this->errMess);
        } 

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput($request->input());
        }

        $username = $request->current_username;
        $currUser = Users::where('username', $username)->get();

        Users::where('username', $username)->update([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'role'  => $request->role,
            'status' => $request->status,
            'phone' => $request->phone,
        ]);
        
        $password = $request->password;

        if(isset($password) && $password!=NULL){
            $password = bcrypt($password);
            User::where('username', $request->username)->update([
                'password' => $password
            ]);
        }

        if ($request->file('avatar')) {
            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;
            $path = '/uploads/avatar/'.$fileName;
            $uploadPath = public_path('/uploads/avatar');
            $request->file('image')->move($uploadPath, $fileName);

            Users::where('username', $username)->update([
                'avatar' => $path
            ]);

            $oldPath = public_path().$currUser[0]->avatar;
            if(file_exists($oldPath)){
                unlink($oldPath);
            }
        }

        return redirect()->back()->with('editSuccess', 'success');
    }

    public function banUser($username){
        if(isset($username)&&$username!=NULL){
            Users::where([
                ['username', '=', $username],
                ['role', '<>', 1],
                ['role', '<>', 5]
            ])->update([
                'role' => 5
            ]);
        }
        return redirect()->back();
    }
}