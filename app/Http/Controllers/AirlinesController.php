<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use Illuminate\Http\Request;

class AirlinesController extends Controller
{
    public function show($id)
    {
        $airline = Airline::findOrFail($id);
        return view('airlines.show', [
            'airline' => $airline,
            'cities' => $airline->cities->pluck('name')
        ]);
    }

    public function index()
    {
        return view('airlines.index', [
            'airlines' => Airline::orderBy('name')->get()
        ]);
    }
}
