<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Validator;

class DeviceController extends Controller
{
    //best option 1

    public function list($id = null)
    {
        return $id?Device::find($id) : Device::all();

    }

// option 2
    // public function list()
    // {
    //     return Device::all();

    // }


    // public function listparams($id = null)
    // {
    //     return Device::find($id);

    // }

    public function add(Request $request){
        $device = new Device;
        $device->name=$request->name;
        $device->member_id=$request->member_id;
        $result = $device->save();

        if($result){
            return ["Result" => "Data has been saved"];

        }else{
            return ["Result" => "Operation failled"];

        }
    }

    public function update(Request $request){
        $device = Device::find($request->id);
        $device->name=$request->name;
        $device->member_id=$request->member_id;
        $result=$device->save();

        if($result){
            return ["result"=>"Data is Updated"];

        }else{
            return ["Result" => "Operation failled"];

        }

    }

    public function search($name){
        return Device::where("name", "like", "%".$name."%")->get();
    }

    public function delete($id){

        $device = Device::find($id);
        $result = $device->delete();

        if($result){
            return ['result'=>"data has been deleted"];
        }else{
            return ['result'=>"Faild to delete"];
        }
    }

    public function testData(Request $request){
        $rules=array(
            "member_id"=>"required|min:3|max:4"
        );
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            // return $validator->errors();
            return response()->json($validator->errors(), 401) ;

        }else{
            $device = new Device;
            $device->name=$request->name;
            $device->member_id=$request->member_id;
            $result = $device->save();

            if($result){
                return ["result"=>"Data is Saved"];

            }else{
                return ["Result" => "Operation failled"];

            }
        }

    }
}
