@extends('layout')
@section('content')
    <h1>Városok</h1>
    <p>Ide kerülnek a feladat kapcsán érintett városok.</p>
    <ul>
        @foreach($cities as $city)
            <li>
                <h3><a href="/cities/{{ $city->id }}">{{ $city->name }}</a></h3>
            </li>
        @endforeach
    </ul>
@endsection
