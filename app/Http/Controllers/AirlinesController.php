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

    public function create()
    {
        return view('airlines.create');
    }
    public function store(Request $request)
    {
        // $airline = new Airline();
        // $airline->name = request('legitarsasagneve');
        // $airline->save();

        Airline::create([
            'name' => request('legitarsasagneve')
        ]);
        return redirect('airlines');
    }
}
