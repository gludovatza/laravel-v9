@extends('layout')
@section('content')
    <h1>Repülőjáratok</h1>
    <p>Ide kerülhetnek a repülőjárat információk.</p>
    <p><a href="{{ route('flights.create') }}">Repülőjárat létrehozása</a></p>
    <ul>
        @foreach($flights as $flight)
            <li>
                <h3><a href="/flights/{{ $flight->id }}">{{ $flight->number }}</a></h3>

                @if ($flight->captain)
                    <h4>Kapitány: {{ $flight->captain->name }}</h4>
                @endif
                <a href="{{ route('flights.edit', $flight->id) }}">Repülőjárat szerkesztése</a>
            </li>
        @endforeach
    </ul>
@endsection
