@extends('layout')
@section('content')
    <h1>Új utas létrehozása</h1>
    <form class="border border-light p-5" action="/passengers" method="POST">
        @csrf

        <label for="utasneve">Utas neve:</label>
        <input type="text" name="utasneve" id="utasneve" class="form-control mt-2 mb-4" placeholder="Utas neve" required>

        <label for="repulojarata">Repülőjárata:</label>
        <select class="form-select mt-2 mb-4" name="repulojarata" id="repulojarata" required>
            @foreach($flights as $flight)
                <option value="{{ $flight->id }}">{{ $flight->number }}</option>
            @endforeach
        </select>

        <input class="btn btn-info btn-block" type="submit" value="Mentés" dusk="save-button">
    </form>
@endsection

