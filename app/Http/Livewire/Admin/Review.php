<?php

namespace App\Http\Livewire\Admin;

use App\Models\Reviews;
use Livewire\Component;
use Livewire\WithPagination;

class Review extends Component
{
    use WithPagination;
    public function render()
    {
        $reviews=Reviews::orderBy('id','DESC')->paginate(5);
        return view('livewire.admin.review',['reviews'=>$reviews])->layout('layouts.admin-app');
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
