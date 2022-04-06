@extends('layout')
@section('content')
    <h1>Utas neve: {{ $passengerName }}</h1>
    <h2>Repülőjárat száma: {{ $flightNumber }}</h2>
    @if ($luggage)
        <h2>Poggyász száma: {{ $luggage->number }}</h2>
    @endif
@endsection

