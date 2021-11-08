<?php

namespace App\Models;

use App\Http\Livewire\Admin\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table="blogs";

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function admins()
    {
        return $this->belongsTo(Admin::class,'admin_id');
    }

    public function category()
    {
        return $this->belongsTo(Categorie::class,'cat_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
