<?php

namespace App\Http\Livewire\Admin;

use App\Models\Comment as ModelsComment;
use Livewire\Component;
use Livewire\WithPagination;

class Comment extends Component
{
    use WithPagination;
    public function render()
    {
        $comments=ModelsComment::orderBy('id','DESC')->paginate(5);
        return view('livewire.admin.comment',['comments'=>$comments])->layout('layouts.admin-app');
    }

    public function accept($id)
    {
        $comment=ModelsComment::findOrFail($id);
        $comment->status=1;
        $comment->save(); 
    }
    public function reject($id)
    {
        $comment=ModelsComment::findOrFail($id);
        $comment->status=2;
        $comment->save(); 
    }
    public function delete($id)
    {
        $comment=ModelsComment::findOrFail($id);
        $comment->delete(); 
    }
}
