<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookFlight;
use Illuminate\Http\Request;

class BookFlightController extends Controller
{
    public function total_record()
    {
        $book = BookFlight::get();
        return response()->json(count($book));
    }
    public function get()
    {
        $book = BookFlight::orderBy('id', 'DESC')->get();
        return response()->json($book);
    }

    public function accept($id)
    {
        $book=BookFlight::findOrFail($id);
        $book->status=1;
        $result=$book->save();
        if($result){
            return response()->json(["success"=>true]);
        } else{
            return response()->json(["success"=>false]);
        }
    }
    public function reject($id)
    {
        $book=BookFlight::findOrFail($id);
        $book->status=2;
        $result=$book->save();
        if($result){
            return response()->json(["success"=>true]);
        } else{
            return response()->json(["success"=>false]);
        }
    }
    public function delete($id)
    {
        $book=BookFlight::findOrFail($id);
        $result=$book->delete(); 
        if($result){
            return response()->json(["success"=>true]);
        } else{
            return response()->json(["success"=>false]);
        }

    }
}
