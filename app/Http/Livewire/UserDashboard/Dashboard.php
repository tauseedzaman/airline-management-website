<?php

namespace App\Http\Livewire\UserDashboard;

use App\Models\BookFlight;
use App\Models\Reviews;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $total_booking;
    public $total_reviews;
    public function render()
    {
        $this->total_booking=BookFlight::where('user_id',Auth::user()->id)->get();
        $this->total_reviews=Reviews::where('user_id',Auth::user()->id)->get();
        return view('livewire.user-dashboard.dashboard')->layout('layouts.user-app');
    }
}
