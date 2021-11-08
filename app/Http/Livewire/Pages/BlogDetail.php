<?php

namespace App\Http\Livewire\Pages;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BlogDetail extends Component
{
    public $blogDetail;
    public $blog_id;

    public $comment;

    public $getComments;

    public $total_comments;

    public $total_likes;

    public function mount($slug)
    {
        $posts=Blog::where("slug",$slug)->first();
        $this->blog_id=$posts->id;
    }

    public function render()
    {

        $this->blogDetail=Blog::find($this->blog_id);
        $this->getComments=Comment::latest()->where(['blog_id'=>$this->blog_id])->get();
        $this->total_likes=Like::where('blog_id',$this->blog_id)->count();
        return view('livewire.pages.blog-detail')->layout("layouts.app");
    }

    public function submit_comment($id)
    {
        $comment=new Comment();
        $this->validate([
            'comment'=>'required'
        ]);
        $comment->user_id=Auth::user()->id;
        $comment->blog_id=$id;
        $comment->comment=$this->comment;
        $comment->save();
        unset($this->comment);
    }

    public function like($id)
    {
        $like=new Like();

        $is_like=Like::where(['user_id'=>Auth::user()->id,'blog_id'=>$id])->first();
        if($is_like){
            $is_like->delete();
        }else{
            $like->user_id=Auth::user()->id;
            $like->blog_id=$id;
            $like->like=1;
            $like->save();
        }
    }
}
