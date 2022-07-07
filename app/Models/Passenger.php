<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'flight_id', 'age', 'email', 'phone'];

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function luggage()
    {
        return $this->hasMany(Luggage::class);
    }
}
