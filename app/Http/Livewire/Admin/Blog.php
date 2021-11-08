<?php

namespace App\Http\Livewire\Admin;

use App\Models\Blog as ModelsBlog;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Blog extends Component
{

    public $createData = false;
    public $updateData = false;
    public $showData = true;

    public $title;
    public $cat_id;
    public $desc;
    public $file;

    public $categorys;

    public $ids;
    public $edit_title;
    public $edit_cat_id;
    public $edit_desc;
    public $new_file;
    public $old_file;

    use WithFileUploads;
    use WithPagination;
    public function render()
    {
        if(Auth::guard('admin')->user()->roll == 1){

            $posts = ModelsBlog::orderBy('id', "DESC")->paginate(4);
        }else{
            $posts = ModelsBlog::orderBy('id', "DESC")->where('admin_id',Auth::guard('admin')->user()->id)->paginate(4);

        }
        $this->categorys = Categorie::get();
        return view('livewire.admin.blog', ['posts' => $posts])->layout("layouts.admin-app");
    }

    public function showForm()
    {
        $this->createData=true;
        $this->showData = false;

    }
    public function store()
    {
        $posts = new  ModelsBlog();
        $categorys=new Categorie();

        $this->validate([
            "title" => "required",
            "desc" => "required",
            "cat_id" => "required",
        ]);

        $filename = "";
        if ($this->file != null) {
            $filename = $this->file->store("upload/posts", "public");
        } else {
            $filename = "Null";
        }

        $posts->title = $this->title;
        $posts->admin_id = 1;
        $posts->cat_id = $this->cat_id;
        $posts->views = 0;
        $posts->slug = Str::slug($this->title);
        $posts->description = $this->desc;
        $posts->image = $filename;
        $posts->save();

        $categorys=Categorie::findOrFail($this->cat_id);
        $posts=$categorys->post + 1;
        $categorys->posts=$posts;
        $categorys->save();

        $this->createData = false;
        $this->showData = true;

        $this->desc = "";
        $this->cat_id = "";
        $this->title = "";
        $this->file = "";
    }

    public function edit($id)
    {
        $this->showData = false;
        $this->updateData = true;

        $posts = ModelsBlog::find($id);
        $this->ids = $posts->id;
        $this->edit_title = $posts->title;
        $this->edit_desc = $posts->description;
        $this->edit_cat_id = $posts->cat_id;
        $this->old_file = $posts->image;
    }
    public function update($id)
    {
        $posts = ModelsBlog::findOrFail($id);

        $this->validate([
            "edit_title" => "required",
            "edit_desc" => "required",
            "edit_cat_id" => "required",
        ]);

        $filename = "";
        $destination = public_path("storage\\" . $posts->image);
        // ddd($destination);
        if ($this->new_file != null) {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename = $this->new_file->store("upload/posts", "public");
        } else {
            $filename = $this->old_file;
        }

        $posts->title = $this->edit_title;
        $posts->cat_id = $this->edit_cat_id;
        $posts->description = $this->edit_desc;
        $posts->image = $filename;
        $posts->save();

        $this->updateData = false;
        $this->showData = true;

        $this->edit_desc = "";
        $this->edit_cat_id = "";
        $this->edit_title = "";
        $this->old_file = "";
        $this->new_file = "";
    }

    public function delete($id)
    {

        $posts=ModelsBlog::find($id);

        $destination = public_path("storage\\" . $posts->image);

        if (File::exists($destination)) {
            File::delete($destination);
        }

        $posts->delete();

    }
}
