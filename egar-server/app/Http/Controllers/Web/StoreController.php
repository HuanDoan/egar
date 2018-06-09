<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\Store;

class StoreController extends Controller
{
    private $errMess        = [
        'required'      => ':attribute không được để trống!',
        'unique'        => ':attribute đã tồn tại trong hệ thống!',
        'email'         => ':attribute không phải là địa chỉ email hợp lệ!',
        'same'          => ':attribute không khớp với :other!',
        'max'           => ':attribute tối đa :max ký tự!',
        'min'           => ':attribute ít nhất :min ký tự!',
        'regex'         => ':attribute không được chứa ký tự đặc biệt!',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();
        return view('cpanel/pages/store', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cpanel/pages/store_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'address' => 'required|max:255',
            'description' => 'nullable',
            'lat' => 'required',
            'lng' => 'required',
            'phone' => 'nullable',
            'avatar' => 'image|max:3072'
        ], $this->errMess);

        if ($validator->fails()) {
            return redirect()->route('cpanel.get.add.users')
                        ->withErrors($validator)
                        ->withInput($request->input());
        }

        if ($request->file('avatar')) {
            $fileExtension = $request->file('avatar')->getClientOriginalExtension();
            $fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;
            $path = '/uploads/avatar/'.$fileName;
            $uploadPath = public_path('/uploads/avatar');
            $request->file('avatar')->move($uploadPath, $fileName);
        }
        else{
            $path = '';
        }

        $user_id = Auth::guard('admin')->id();

        $new_store = $request->all();
        $new_store['created_by'] = $user_id;
        $new_store['status'] = 2;
        $new_store['avatar'] = $path;
        $new_store['rate'] = 0;
        $store = Store::create($new_store);

        return redirect()->back()->with('addsuccess', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('cpanel.pages.store_show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Store::where('id', $id)->delete();
        return redirect()->back()->with('removesuccess', 'success');
    }

    /**
     * Remove store
     * Change status of store to zero
     * 
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function remove($id){
        Store::where('id', $id)->update([
            'status' => 0
        ]);

        return redirect()->back()->with('removesuccess', 'success');
    }
}
