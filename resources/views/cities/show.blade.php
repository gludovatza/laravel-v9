@extends('layout')
@section('content')
    <h1>Város neve: {{ $city->name }}</h1>
    @if ($city->airlines)
        <p>Itt levő légitársaságok:</p>
        <ul>
            @forelse ($airlines as $airline)
                <li>{{ $airline }}</li>
            @empty
                <li>Nincs légitársaság a városban.</li>
            @endforelse
        </ul>
    @endif
@endsection
