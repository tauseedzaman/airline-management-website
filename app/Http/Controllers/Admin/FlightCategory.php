<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FlightCategory as ModelsFlightCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PDO;

class FlightCategory extends Controller
{

    public function total_record()
    {
        $categorys=ModelsFlightCategory::get();
        return response()->json(count($categorys));
    }
    public function get()
    {
        $categorys=ModelsFlightCategory::orderBy('id','DESC')->get();
        return response()->json($categorys);
    }

    public function create(Request $request)
    {
        $categorys=new ModelsFlightCategory();
        $filename="";
        if($request->hasFile('file')){
            $filename=$request->file('file')->store("upload/flightcategory",'public');
        }else{
            $filename="NuLL";
        }

        $categorys->category_name=$request->category_name;
        $categorys->flight=0;
        $categorys->image=$filename;
        $result=$categorys->save();
        if($result){
            return response()->json(["success"=>true]);
        }else{
            return response()->json(["success"=>false]);
        }
    }

    public function edit($id)
    {
        $categorys=ModelsFlightCategory::findOrFail($id);
        return response()->json($categorys);
    }

    public function update(Request $request,$id)
    {
        $categorys=ModelsFlightCategory::findOrFail($id);
        $filename="";
        $destination=public_path("storage\\".$categorys->image);
      
        if($request->hasFile('new_file')){
            if(File::exists($destination)){
                File::delete($destination);
            }
            $filename=$request->file('new_file')->store("upload/flightcategory",'public');
        }else{
            $filename=$request->old_file;
        }

        $categorys->category_name=$request->category_name;
        $categorys->image=$filename;
        $result=$categorys->save();
        if($result){
            return response()->json(["success"=>true]);
        }else{
            return response()->json(["success"=>false]);
        }
    }

    public function delete($id)
    {
        $categorys=ModelsFlightCategory::findOrFail($id);
        $destination=public_path("storage\\".$categorys->image);
        if(File::exists($destination)){
            File::delete($destination);
        }
        $result=$categorys->delete();
        if($result){
            return response()->json(["success"=>true]);
        }else{
            return response()->json(["success"=>false]);
        }
    }


}
