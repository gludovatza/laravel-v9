@extends('layout')
@section('content')
    <h1>Repülőjárat száma: {{ $flight->number }}</h1>
    @if ($flight->name)
        <p>Neve: {{ $flight->name }}</p>
    @endif
    @if ($flight->price)
        <p>Ára: {{ $flight->price }}</p>
    @endif
    @if ($flight->captain)
        <p>Kapitány: {{ $flight->captain->name }}</p>
    @endif

    <p>Utasok:</p>
    <ul>
        @forelse ($passengers as $passenger)
            <li>{{ $passenger }}</li>
        @empty
            <li>Nincs utasa a repülőjáratnak.</li>
        @endforelse
    </ul>

@endsection

