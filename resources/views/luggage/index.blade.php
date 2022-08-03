@extends('layout')
@section('content')
    <h1>Poggyászok</h1>
    <p>Ide kerülnek a poggyász információk.</p>
    <p><a href="{{ route('luggage.create') }}">Csomag létrehozása</a></p>
    <ul>
        @foreach($luggage as $l)
            <li>
                <h3><a href="/luggage/{{ $l->id }}">{{ $l->number }}</a></h3>
            </li>
        @endforeach
    </ul>
@endsection

