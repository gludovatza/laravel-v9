<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function show($id)
    {
        $city = City::findOrFail($id);
        return view('cities.show', [
            'city' => $city,
            'airlines' => $city->airlines->pluck('name')
        ]);
    }

    public function index()
    {
        return view('cities.index', [
            'cities' => City::orderBy('name')->get()
        ]);
    }
}
