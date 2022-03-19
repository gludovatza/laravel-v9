<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = ['number'];

    public function captain()
    {
        return $this->hasOne(Captain::class);
    }

    public function passengers() {
        return $this->hasMany(Passenger::class);
    }
}
