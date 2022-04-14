@extends('layout')
@section('content')
    <h1>Utasok</h1>
    <p>Ide kerülnek a utasok információi.</p>
    <p><a href="/passengers/create">Új utas felvitele</a></p>
    <ul>
        @foreach($passengers as $passenger)
            <li>
                <h3><a href="/passengers/{{ $passenger->id }}">{{ $passenger->name }}</a></h3>
                <a href="/passengers/{{ $passenger->id }}/edit">Szerkesztés</a>
            </li>
        @endforeach
    </ul>
@endsection

