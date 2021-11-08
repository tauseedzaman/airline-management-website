<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function posts()
    {
        return $this->belongsTo(Blog::class,'blog_id');
    }
}
