@extends('layout')
@section('content')
    <h1>Új utas létrehozása</h1>
    <form class="border border-light p-5" action="/passengers" method="POST">
        @csrf

        <label for="utasneve">Utas neve:</label>
        <input type="text" name="utasneve" id="utasneve" class="form-control mt-2 mb-4" placeholder="Utas neve" minlength="10" maxlength="50" required>

        <label for="age">Életkor:</label>
        <input type="number" name="age" id="age" class="form-control mt-2 mb-4" min="6" max="99" required>

        <label for="email">E-mail cím:</label>
        <input type="email" name="email" id="email" class="form-control mt-2 mb-4" maxlength="100" required>

        <label for="phone">Telefonszám:</label>
        <input type="text" name="phone" id="phone" class="form-control mt-2 mb-4" maxlength="11" placeholder="20/123-4567" pattern="[0-9]{2}[/][0-9]{3}[-][0-9]{4}" required>

        <label for="repulojarata">Repülőjárata:</label>
        <select class="form-select mt-2 mb-4" name="repulojarata" id="repulojarata" required>
            @foreach($flights as $flight)
                <option value="{{ $flight->id }}">{{ $flight->number }}</option>
            @endforeach
        </select>

        <input class="btn btn-info btn-block" type="submit" value="Mentés" dusk="save-button">
    </form>
@endsection

