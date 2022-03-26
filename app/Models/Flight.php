<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'name', 'price', 'captain_id', 'airline_id'];

    public function captain()
    {
        return $this->hasOne(Captain::class);
    }

    public function passengers() {
        return $this->hasMany(Passenger::class);
    }

    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }
}
