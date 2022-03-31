@extends('layout')
@section('content')
    <h1>Poggyászok</h1>
    <p>Ide kerülnek a poggyász információk.</p>
    <ul>
        @foreach($luggages as $luggage)
            <li>
                <h3><a href="/luggages/{{ $luggage->id }}">{{ $luggage->number }}</a></h3>
            </li>
        @endforeach
    </ul>
@endsection

