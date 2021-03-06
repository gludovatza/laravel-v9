<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Airline;
use Illuminate\Http\Request;

class AirlinesController extends Controller
{
    public function show(Airline $airline)
    {
        //dd($airline);
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
        return view('airlines.create', [
            'cities' => City::orderBy('name')->get()
        ]);
    }
    public function store(Request $request)
    {
        // $airline = new Airline();
        // $airline->name = request('legitarsasagneve');
        // $airline->save();

        Airline::create([
            'name' => request('legitarsasagneve')
        ])->cities()->attach(request('cities'));
        return redirect(route('airlines.index'));
    }

    public function edit(Airline $airline)
    {
        return view('airlines.edit', [
            'airline' => $airline,
            'cities' => City::orderBy('name')->get()
        ]);
    }

    public function update(Request $request, Airline $airline)
    {
        $airline->update([
            'name' => request('legitarsasagneve'),
        ]);

        $airline->cities()->sync(request('cities'));

        return redirect(route('airlines.index'));
    }

    public function destroy(Airline $airline)
    {
        $airline->delete();
        return redirect(route('airlines.index'));
    }
}
