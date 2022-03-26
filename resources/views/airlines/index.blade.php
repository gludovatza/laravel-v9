@extends('layout')
@section('content')
    <h1>Légitársaságok</h1>
    <p>Ide kerülnek a légitársaság információk.</p>
    <ul>
        @foreach($airlines as $airline)
            <li>
                <h3><a href="/airlines/{{ $airline->id }}">{{ $airline->name }}</a></h3>
            </li>
        @endforeach
    </ul>
@endsection

