@extends('layout')
@section('content')
    <h1>Légitársaságok</h1>
    <p>Ide kerülnek a légitársaság információk.</p>
    <p><a href="/airlines/create">Új légitársaság létrehozása</a></p>
    <ul>
        @foreach($airlines as $airline)
            <li>
                <h3><a href="/airlines/{{ $airline->id }}">{{ $airline->name }}</a></h3>
                <a href="/airlines/{{ $airline->id }}/edit">Szerkesztés</a>
            </li>
        @endforeach
    </ul>
@endsection

