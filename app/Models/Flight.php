<?php

namespace App\Models;

use App\Http\Livewire\Admin\Review;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;
    protected $table="flights";

    public function reviews()
    {
        return $this->belongsTo(Reviews::class);
    }

    public function book_flights()
    {
        return $this->hasMany(BookFlight::class);
    }

    public function admins()
    {
        return $this->belongsTo(Admin::class,'admin_id');
    }

    public function category()
    {
        return $this->belongsTo(FlightCategory::class,'cat_id');
    }

    public function review()
    {
        return $this->hasMany(Reviews::class);
    }
}
