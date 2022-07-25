@extends('layout')
@section('content')
    <h1>Utas adatainak frissítése</h1>
    <form class="border border-light p-5"
        action="/passengers/{{ $passenger->id }}"
        method="POST"
        id="passengerEditForm">
        @method('PUT')
        @csrf

        <label for="utasneve">Utas neve:</label>
        <input type="text"
            value="{{ $passenger->name }}"
            name="utasneve"
            id="utasneve"
            class="form-control mt-2 mb-4"
            placeholder="Utas neve"
            minlength="10"
            maxlength="50"
            required>

        <label for="age">Életkor:</label>
        <input type="number"
            value="{{ $passenger->age }}"
            name="age"
            id="age"
            class="form-control mt-2 mb-4"
            min="6"
            max="99"
            required>

        <label for="email">E-mail cím:</label>
        <input type="email"
            value="{{ $passenger->email }}"
            name="email"
            id="email"
            class="form-control mt-2 mb-4"
            maxlength="100"
            required>

        <label for="phone">Telefonszám:</label>
        <input type="text"
            value="{{ $passenger->phone }}"
            name="phone"
            id="phone"
            class="form-control mt-2 mb-4"
            maxlength="11"
            placeholder="20/123-4567"
            pattern="[0-9]{2}[/][0-9]{3}[-][0-9]{4}"
            required>

        <label for="repulojarata">Repülőjárata:</label>
        <select class="form-select mt-2 mb-4"
            name="flight_id"
            id="repulojarata"
            required>
            @foreach ($flights as $flight)
                <option value="{{ $flight->id }}"
                    @if ($flight->id == $passenger->flight_id) selected @endif>
                    {{ $flight->number }}
                </option>
            @endforeach
        </select>

        <input class="btn btn-info btn-block"
            type="submit"
            value="Frissítés">
    </form>
@endsection

@push('head-scripts')
<script src="{!! mix('js/app.js') !!}"></script>
    {{-- <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script> --}}

@endpush

@push('scripts')
    <script>
        const validation = new window.JustValidate('#passengerEditForm');

        validation
            .addField('#utasneve', [{
                    rule: 'required',
                    errorMessage: 'Név mező megadása kötelező!',
                },
                {
                    rule: 'minLength',
                    value: 10,
                    errorMessage: 'A Név mező legalább 10 betűből álljon!',
                },
                {
                    rule: 'maxLength',
                    value: 50,
                    errorMessage: 'A Név mező legfeljebb 50 betűből álljon!',
                },
            ])
            .addField('#email', [{
                    rule: 'required',
                    errorMessage: 'E-mail mező megadása kötelező!',
                },
                {
                    rule: 'email',
                    errorMessage: 'Az e-mail érvénytelen!',
                },
                {
                    rule: 'maxLength',
                    value: 100
                },
            ])
            .onSuccess((ev) => {
                ev.target.submit();
            });
    </script>
@endpush
