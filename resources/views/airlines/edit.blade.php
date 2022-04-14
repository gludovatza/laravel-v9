@extends('layout')
@section('content')
    <h1>Légitársaság frissítése</h1>
    <form class="border border-light p-5" action="/airlines/{{ $airline->id }}" method="POST">
        @method('PUT')
        @csrf
        <label for="legitarsasagneve">Légitársaság neve:</label>
        <input type="text" value="{{ $airline->name }}" name="legitarsasagneve" id="legitarsasagneve" class="form-control mt-2 mb-4" placeholder="Légitársaság neve" required>

        <label for="cities">Telephelyei (városai):</label>
        <select class="form-select mt-2 mb-4" name="cities[]" id="cities" multiple required>
            @foreach($cities as $city)
                <option value="{{ $city->id }}" @if ($airline->cities->pluck("id")->contains($city->id)) selected @endif>
                    {{ $city->name }}
                </option>
            @endforeach
        </select>

        <input class="btn btn-info btn-block" type="submit" value="Frissítés">
    </form>
@endsection

