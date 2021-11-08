<?php

namespace App\Http\Livewire\UserDashboard;

use App\Models\Reviews;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MyReview extends Component
{

    public $total_reviews;

    use WithPagination;

    public function render()
    {
        $this->total_reviews=Reviews::where('user_id',Auth::user()->id)->get();
        $reviews=Reviews::orderBy('id','DESC')->where('user_id',Auth::user()->id)->paginate(5);
        return view('livewire.user-dashboard.my-review',['reviews'=>$reviews])->layout('layouts.user-app');
    }
}
