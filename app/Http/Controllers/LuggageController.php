<?php

namespace App\Http\Controllers;

use App\Models\Luggage;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LuggageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('luggage.index', [
            'luggage' => Luggage::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('luggage.create', [
            'passengers' => Passenger::orderBy('name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'number' => 'required|max:255',
        //     'passenger_id' => 'required|integer|exists:passengers,id',
        // ], [
        //     'number.required' => 'A Csomag szám mező kitöltése kötelező.',
        //     'number.max' => 'A csomag száma maximum 255 karakter hosszú lehet.',
        //     'passenger_id.required' => 'Az Utas megadása kötelező.',
        //     'passenger_id.integer' => 'Az Utas azonosítójának számnak kell lennie.',
        //     'passenger_id.exists' => 'Csak létező utast adhat meg.',
        // ]);

        $validator = Validator::make(request()->all(), [
            'number' => 'required|max:255',
            'passenger_id' => 'required|integer|exists:passengers,id',
        ], [
            'number.required' => 'A Csomag szám mező kitöltése kötelező.',
            'number.max' => 'A csomag száma maximum 255 karakter hosszú lehet.',
            'passenger_id.required' => 'Az Utas megadása kötelező.',
            'passenger_id.integer' => 'Az Utas azonosítójának számnak kell lennie.',
            'passenger_id.exists' => 'Csak létező utast adhat meg.',
        ]);

        if($validator->fails()) {
            return redirect(route('luggage.create'))
                ->withErrors($validator)
                ->withInput();
        }

        // Ha idáig eljutunk a feldolgozásban, akkor az érkező adatok már érvényesek
        Luggage::create(request()->all());
        return redirect(route('luggage.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Luggage  $luggage
     * @return \Illuminate\Http\Response
     */
    public function show(Luggage $luggage)
    {
        // dd($luggage);
        return view('luggage.show', [
            'number' => $luggage->number,
            'passenger' => $luggage->passenger->name,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Luggage  $luggage
     * @return \Illuminate\Http\Response
     */
    public function edit(Luggage $luggage)
    {
        return view('luggage.edit', [
            'luggage' => $luggage
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Luggage  $luggage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Luggage $luggage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Luggage  $luggage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Luggage $luggage)
    {
        //
    }
}
