<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BookFlight;
use App\Models\Comment;
use App\Models\Reviews;
use Illuminate\Http\Request;

class BookFlightController extends Controller
{
    public function index()
    {
        $book=Reviews::with('user')->where('user_id',$id)->get();
        return response()->json($book);
    }
}
