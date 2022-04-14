@extends('layout')
@section('content')

    <h1>Utas adatainak frissítése</h1>
    <form class="border border-light p-5" action="/passengers/{{ $passenger->id }}" method="POST">
        @method('PUT')
        @csrf
        <label for="utasneve">Utas neve:</label>
        <input type="text" value="{{ $passenger->name }}" name="name" id="utasneve" class="form-control mt-2 mb-4" placeholder="Utas neve" required>

        <label for="repulojarata">Repülőjárata:</label>
        <select class="form-select mt-2 mb-4" name="flight_id" id="repulojarata" required>
            @foreach($flights as $flight)
                <option value="{{ $flight->id }}" @if ($flight->id == $passenger->flight_id) selected @endif>
                    {{ $flight->number }}
                </option>
            @endforeach
        </select>

        <input class="btn btn-info btn-block" type="submit" value="Frissítés">
    </form>
@endsection

