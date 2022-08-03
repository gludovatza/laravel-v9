@extends('layout')
@section('content')
    <h1>Új csomag létrehozása</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="border border-light p-5"
        action="{{ route('luggage.store') }}"
        method="POST"
        name="csomagLetrehozo"
        id="csomagLetrehozo"
        >
        @csrf

        <label for="number">Csomag száma:</label>
        <input type="text"
            name="number"
            id="number"
            class="form-control mt-2 mb-4"
            placeholder="Csomag száma"
            value="{{ old('number') }}"
            >
        @if ($errors->has('number'))
        <div class="text-danger">{{ $errors->first('number') }}</div>
        @endif

        <label for="passenger">Utas:</label>
        <select class="form-select mt-2 mb-4"
            name="passenger_id"
            id="passenger"
            >
            @foreach ($passengers as $passenger)
                <option value="{{ $passenger->id }}" @selected(old('passenger_id') == $passenger->id)>{{ $passenger->name }}</option>
            @endforeach
        </select>
        @error('passenger_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror

        <input class="btn btn-info btn-block"
            type="submit"
            value="Mentés">
    </form>
@endsection

@push('head-scripts')

@endpush

@push('scripts')
    <script>

    </script>
@endpush
