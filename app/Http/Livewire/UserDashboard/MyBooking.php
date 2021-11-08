<?php

namespace App\Http\Livewire\UserDashboard;

use App\Models\BookFlight;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MyBooking extends Component
{
    use WithPagination;
    public function render()
    {
        $booking=BookFlight::orderBy('id','DESC')->where('user_id',Auth::user()->id)->paginate(5);
        return view('livewire.user-dashboard.my-booking',['booking'=>$booking])->layout('layouts.user-app');
    }

    public function delete($id)
    {
        $book=BookFlight::findOrFail($id);
        $book->delete();
        
    }
}
