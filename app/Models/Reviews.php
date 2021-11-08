<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    public function flight()
    {
        return $this->hasMany(Flight::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function flights()
    {
        return $this->belongsTo(Flight::class,'flight_id');
    }
}
