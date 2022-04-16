<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightsController extends Controller
{
    public function show($id)
    {
        $flight = Flight::with('Captain')->findOrFail($id);
        return view('flights.show', [
            'flight' => $flight,
            'passengers' => $flight->passengers->pluck('name')
        ]);
        // return view('flights.show', compact('flight'));
    }

    public function index()
    {
        return view('flights.index', [
            'flights' => Flight::latest()->with('Captain')->get()
        ]);
    }

    public function getActiveFlightsFromTo($active, $from, $to = null)
    {
        return Flight::getFilteredFlights($active, $from, $to);
    }
}
