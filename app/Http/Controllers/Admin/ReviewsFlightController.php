<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewsFlightController extends Controller
{
    
    public function total_record()
    {
        $reviews = Reviews::get();
        return response()->json(count($reviews));
    }
    public function get()
    {
        $reviews = Reviews::orderBy('id', 'DESC')->get();
        return response()->json($reviews);
    }

    public function accept($id)
    {
        $reviews=Reviews::findOrFail($id);
        $reviews->status=1;
        $reviews->save(); 
    }
    public function reject($id)
    {
        $reviews=Reviews::findOrFail($id);
        $reviews->status=2;
        $reviews->save(); 
    }
    public function delete($id)
    {
        $reviews=Reviews::findOrFail($id);
        $reviews->delete(); 
    }
}
