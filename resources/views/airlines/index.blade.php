@extends('layout')
@section('content')
    <h1>Légitársaságok</h1>
    <p>Ide kerülnek a légitársaság információk.</p>
    <p><a href="{{ route('airlines.create') }}">Új légitársaság létrehozása</a></p>
    <ul>
        @foreach($airlines as $airline)
            <li>
                {{-- <h3><a href="/airlines/{{ $airline->id }}">{{ $airline->name }}</a></h3>
                <a href="/airlines/{{ $airline->id }}/edit">Szerkesztés</a> --}}
                <h3><a href="{{ route('airlines.show', $airline->id) }}">{{ $airline->name }}</a></h3>
                <a href="{{ route('airlines.edit', $airline->id) }}">Szerkesztés</a>
            </li>
        @endforeach
    </ul>
@endsection

