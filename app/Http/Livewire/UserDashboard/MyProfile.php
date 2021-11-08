<?php

namespace App\Http\Livewire\UserDashboard;

use App\Models\BookFlight;
use Livewire\Component;
use Livewire\WithPagination;

class MyProfile extends Component
{
    public function render()
    {
        
        return view('livewire.user-dashboard.my-profile')->layout('layouts.user-app');
    }
}
