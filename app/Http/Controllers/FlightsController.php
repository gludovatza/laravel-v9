<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Airline;
use App\Models\Captain;
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

    public function create()
    {
        return view('flights.create', [
            'captains' => Captain::orderBy('name')->get(),
            'airlines' => Airline::orderBy('name')->get()
        ]);
    }
    public function store(Request $request)
    {
        Flight::create(request()->all());
        return redirect(route('flights.index'));
    }

    public function edit(Flight $flight)
    {
        return view('flights.edit', [
            'flight' => $flight,
            'captains' => Captain::orderBy('name')->get(),
            'airlines' => Airline::orderBy('name')->get()
        ]);
    }

    public function update(Request $request, Flight $flight)
    {
        $flight->update(request()->all());
        return redirect(route('flights.index'));
    }

    public function destroy(Flight $flight)
    {
        $flight->delete();
        return redirect(route('flights.index'));
    }

    public function getActiveFlightsFromTo($active, $from, $to = null)
    {
        return Flight::getFilteredFlights($active, $from, $to);
    }
}
