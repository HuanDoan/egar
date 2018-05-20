<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Store;

class MapController extends Controller
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

    private function getDistance($lat1, $lng1, $lat2, $lng2){
        $earthRadius = 6371000;

        //Covert from degrees to radians
        $lat1 = deg2rad($lat1);
        $lat2 = deg2rad($lat2);
        $lng1 = deg2rad($lng2);
        $lng2 = deg2rad($lng2);

        //Calculate angle
        $delta = $lng2-$lng1;
        $a = pow(cos($lat2) * sin($delta), 2) + pow(cos($lat1) * sin($lat2) - sin($lat1) * cos($lat2) * cos($delta), 2);
        $b = sin($lat1) * sin($lat2) + cos($lat1) * cos($lat2) * cos($delta);
        $angle = atan2(sqrt($a), $b);

        return $angle*$earthRadius;
    }

    public function addNewStore(Request $request){
        $uid = $request->user()->id;
        $username =$request->user()->username;

        $validator = Validator::make($request->all(), [
            'name'      => 'required|max:191',
            'address'   => 'required|max:255',
            'lat'       => 'required',
            'lng'       => 'required',
            'phone'     => 'nullable|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], $this->errorStatus);
        }

        $data = $request->all();
        $data['rate'] = 0;
        $data['status'] = 0;
        $data['created_by'] = $uid;
        
        $new_store = Store::create($data);
        
        if(isset($new_store->id)){
            return response()->json(['success'=>$new_store], $this->successStatus);
        }
        else{
            $errMess['message'] = 'Cannot save, try again!';
            return response()->json(['error'=>$errMess], $this->errorStatus);
        }
        
        // $success['name'] = $request->store_name;
        // $success['created_by'] = $uid;
    }

    public function getClosestStore(Request $request){
        $validator = Validator::make($request->all(), [
            'lat'   => 'required',
            'lng'   => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], $this->errorStatus);
        }

        $store = Store::all();
        $success = '';

        // Doing ....


        return response()->json(['success' => $success], $this->successStatus);
    }

    public function getAllStore(){
        $stores = Store::with(['createdBy.permission:id,title'])->get();

        return response()->json(['success' => $stores], $this->successStatus);
    }
}
