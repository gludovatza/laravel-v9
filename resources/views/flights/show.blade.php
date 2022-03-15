@extends('layout')
@section('content')
    <h1>Repülőjárat száma: {{ $flight->number }}</h1>
    @if ($flight->name)
        <p>Neve: {{ $flight->name }}</p>
    @endif
    @if ($flight->price)
        <p>Ára: {{ $flight->price }}</p>
    @endif
@endsection

