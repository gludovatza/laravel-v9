<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightsController extends Controller
{
    public function show($id)
    {
        $flight = Flight::findOrFail($id);
        // return view('flights.show', ['flight' => $flight]);
        return view('flights.show', compact('flight'));
    }

    public function index()
    {
        return view('flights.index', [
            'flights' => Flight::latest()->get()
        ]);
    }
}
