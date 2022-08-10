<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Passenger;
use App\Rules\LegalAgeRule;
use Illuminate\Http\Request;
use App\Http\Requests\PassengerStoreUpdateRequest;

class PassengersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('passengers.index', [
            'passengers' => Passenger::with('Flight')->orderBy('name')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('passengers.create', [
            'flights' => Flight::orderBy('name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PassengerStoreUpdateRequest $request)
    {
        $validated = $request->validated();
        // $request->validate([
        //     'utasneve' => 'required|min:10|max:50',
        //     'age' => 'required|numeric|min:6|max:99',
        //     'email' => 'required|email|max:100',
        //     'phone' => 'required|max:11',
        //     'repulojarata' => 'required|integer|exists:flights,id',
        //     'birthdate' => ['required', new LegalAgeRule(18)]
        // ]);

        Passenger::create([
            'name' => request('utasneve'),
            'flight_id' => request('repulojarata'),
            'age' => request('age'),
            'email' => request('email'),
            'phone' => request('phone'),
            'birthdate' => request('birthdate'),
        ]);
        return redirect('passengers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $passenger = Passenger::with('Luggage')->with('Flight')->findOrFail($id);
        return view('passengers.show', [
            'passengerName' => $passenger->name,
            'flightNumber' => $passenger->flight->number,
            'luggage' => $passenger->luggage->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Passenger $passenger)
    {
        return view('passengers.edit', [
            'passenger' => $passenger,
            'flights' => Flight::orderBy('name')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Passenger $passenger)
    {
        $passenger->update(request()->all());

        return redirect('passengers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
