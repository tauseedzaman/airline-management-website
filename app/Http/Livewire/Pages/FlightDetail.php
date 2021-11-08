<?php

namespace App\Http\Livewire\Pages;

use App\Models\BookFlight;
use App\Models\Flight;
use App\Models\FligtLike;
use App\Models\Reviews;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FlightDetail extends Component
{

    public $flightDetail;
    public $flight_id;

    public $kg;
    public $seat;

    public $review;
    public $comment;

    public $getReviews;

    public $total_likes;

    public function mount($slug)
    {
        $flight=Flight::where('slug',$slug)->first();
        $this->flight_id=$flight->id;
    }
    
    public function render()
    {
        $this->flightDetail=Flight::findOrFail($this->flight_id);
        $this->getReviews=Reviews::orderBy('id','DESC')->where(['flight_id'=>$this->flight_id,'status' => 1])->get();
        $this->total_likes=FligtLike::where('flight_id',$this->flight_id)->sum('like');
        return view('livewire.pages.flight-detail')->layout('layouts.app');
    }

    public function bookFlight($id)
    {
        $flight=new BookFlight();
        $this->validate([
            'seat'=>'required',
            'kg'=>'required|max:20'
        ]);
        $is_flight=BookFlight::where(['user_id'=>Auth::user()->id,'flight_id'=>$id])->first();
        if($is_flight){
            ddd(Auth::user()->username.' you already book this plane');
        }else{
            $flight->user_id=Auth::user()->id;
            $flight->flight_id=$id;
            $flight->seats=$this->seat;
            $flight->wait=$this->kg;
            $result=$flight->save();
            if($result){
                ddd('Plane Add Successfully');
            }
        }
    }

    public function submit_comment($id)
    {
        $review=new Reviews();
        $this->validate([
            'review'=>'required',
            'comment'=>'required',
        ]);
        $review->user_id=Auth::user()->id;
        $review->flight_id=$id;
        $review->review=$this->review;
        $review->comment=$this->comment;
        $result=$review->save();
        // if($result){
        //     ddd("review add successfully");
        // }

    }

    public function like($id)
    {
        $like=new FligtLike();

        $is_like=FligtLike::where(['flight_id'=>$id,'user_id'=>Auth::user()->id])->first();
        if($is_like){
            $is_like->delete();
        }else{

            $like->user_id=Auth::user()->id;
            $like->flight_id=$id;
            $like->like = 1;
            $like->save();
        }
    }
}
