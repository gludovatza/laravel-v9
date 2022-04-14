@extends('layout')
@section('content')
    <h1>Légitársaság neve: {{ $airline->name }}</h1>
    @if ($airline->cities)
        <p>Városai:</p>
        <ul>
            @forelse ($cities as $city)
                <li>{{ $city }}</li>
            @empty
                <li>Nincs városa a légitársaságnak.</li>
            @endforelse
        </ul>
    @endif
    <form action="/airlines/{{ $airline->id }}" method="POST">
        @method('DELETE')
        @csrf
        <input class="btn btn-danger btn-block" type="submit" value="Törlés">
    </form>
@endsection

