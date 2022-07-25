<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'name', 'price', 'captain_id', 'airline_id', 'scheduled_departured_at', 'scheduled_arrived_at'];

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

    public static function getFilteredFlights($active, $from, $to = null)
    {
        if($to == null) $to = Carbon::now()->format('Y-m-d');
        return Flight::where('active', $active)->whereBetween('created_at', [$from, $to])->first();
    }
}
