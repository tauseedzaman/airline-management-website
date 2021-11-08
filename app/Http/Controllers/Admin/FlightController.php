<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class FlightController extends Controller
{
    public function total_record()
    {
        $flights=Flight::get();
        return response()->json(count($flights));
    }
    public function get()
    {
        $flights=Flight::with('admins','category')->orderBy('id','DESC')->get();
        return response()->json($flights);
    }
    public function create(Request $request)
    {
        $flights = new Flight();
        $filename = "";
        if ($request->hasFile("file")) {
            $filename = $request->file("file")->store("upload/flights", 'public');
        } else {
            $filename = null;
        }

        $flights->name = $request->name;
        $flights->cat_id = $request->cat_id;
        $flights->admin_id = 1;
        $flights->departure = $request->dep;
        $flights->arrival = $request->arrival;
        $flights->seats= $request->seat;
        $flights->price = $request->price;
        $flights->image = $filename;
        $flights->views = 0;
        $flights->description = $request->description;
        $flights->slug = Str::slug($request->name);
        $result=$flights->save();
        if($result){
            return response()->json(["success"=>true]);
        }else{
            return response()->json(["success"=>false]);
        }
    }

    public function edit($id)
    {
        $flights = Flight::findOrFail($id);
        return response()->json($flights);
    }

    public function update(Request $request,$id)
    {
        $flights = Flight::findOrFail($id);
        $filename = "";
        $destination = public_path('storage\\' . $flights->image);
        if ($request->hasFile("new_file")) {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename = $request->file("new_file")->store("upload/flights", 'public');
        } else {
            $filename = $request->old_file;
        }

        $flights->name = $request->name;
        $flights->cat_id = $request->cat_id;
        $flights->departure = $request->dep;
        $flights->arrival = $request->arrival;
        $flights->seats= $request->seat;
        $flights->price = $request->price;
        $flights->image = $filename;
        $flights->description = $request->description;
        $flights->slug = Str::slug($request->name);
        $result=$flights->save();
        if($result){
            return response()->json(["success"=>true]);
        }else{
            return response()->json(["success"=>false]);
        }
    }
    public function delete($id)
    {
        $flights = Flight::findOrFail($id);
        $destination = public_path('storage\\' . $flights->image);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $result=$flights->delete();
        if($result){
            return response()->json(["success"=>true]);
        }else{
            return response()->json(["success"=>false]);
        }
    }
}
