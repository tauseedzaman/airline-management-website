<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightCategory extends Model
{
    use HasFactory;
    protected $table="flight_categories";

    public function flights()
    {
        return $this->hasMany(Flight::class);
    }
}
