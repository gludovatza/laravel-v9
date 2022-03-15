@extends('layout')
@section('content')
    <h1>Repülőjáratok</h1>
    <p>Ide kerülhetnek a repülőjárat információk.</p>
    <ul>
        @foreach($flights as $flight)
            <li>
                <h3><a href="/flights/{{ $flight->id }}">{{ $flight->number }}</a></h3>
            </li>
        @endforeach
    </ul>
@endsection
