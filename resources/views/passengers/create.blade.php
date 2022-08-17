@extends('layout')
@section('content')
    <h1>Új utas létrehozása</h1>
    <form class="border border-light p-5"
        action="/passengers"
        id="utasLetrehozo"
        method="POST">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <label for="utasneve">Utas neve:</label>
        <input type="text"
            name="utasneve"
            id="utasneve"
            class="form-control mt-2 mb-4"
            placeholder="Utas neve"
            value="{{ old('utasneve') }}"
            minlength="5"
            maxlength="50"
            required>

        <label for="age">Életkor:</label>
        <input type="number"
            name="age"
            id="age"
            class="form-control mt-2 mb-4"
            value="{{ old('age') }}"
            min="6"
            max="99"
            required>

        <label for="birthdate">Születési dátum:</label>
        <input type="date" name="birthdate" id="birthdate" value="{{ old('birthdate', date('Y-m-d')) }}" class="form-control mt-2 mb-4" required>

        <label for="email">E-mail cím:</label>
        <input type="email"
            name="email"
            id="email"
            class="form-control mt-2 mb-4"
            value="{{ old('email') }}"
            maxlength="100"
            required>

        <label for="phone">Telefonszám:</label>
        <input type="text"
            name="phone"
            id="phone"
            class="form-control mt-2 mb-4"
            value="{{ old('phone') }}"
            maxlength="11"
            placeholder="20/123-4567"
            pattern="[0-9]{2}[/][0-9]{3}[-][0-9]{4}"
            required>

        <label for="repulojarata">Repülőjárata:</label>
        <select class="form-select mt-2 mb-4"
            name="repulojarata"
            id="repulojarata"
            required>
            @foreach ($flights as $flight)
                <option value="{{ $flight->id }}" @selected(old('repulojarata') == $flight->id)>{{ $flight->number }}</option>
            @endforeach
        </select>

        <input class="btn btn-info btn-block"
            type="submit"
            value="Mentés"
            dusk="save-button">
    </form>
@endsection

@push('scripts')
    <script>
        // -------------- utasneve --------------
        const utasneve = document.getElementById("utasneve");

        utasneve.addEventListener("input", function(event) {
            if (utasneve.validity.tooLong || utasneve.validity.tooShort) {
                utasneve.setCustomValidity("A névnek legalább 5 és legfeljebb 50 karakteresnek kell lennie!");
                utasneve.reportValidity();
            } else {
                utasneve.setCustomValidity("");
            }
        });

        // -------------- age --------------
        const age = document.getElementById("age");

        age.addEventListener("input", function(event) {
            if (age.validity.rangeOverflow || age.validity.rangeUnderflow) {
                age.setCustomValidity("Legalább 6 és legfeljebb 99 éves lehet az utas!");
                age.reportValidity();
            } else {
                age.setCustomValidity("");
            }
        });

        // -------------- email --------------
        const email = document.getElementById("email");

        email.addEventListener("input", function(event) {
            if (email.validity.typeMismatch) {
                email.setCustomValidity("Ide egy helyes e-mail címet várok!");
                email.reportValidity();
            } else {
                email.setCustomValidity("");
            }
        });

        // -------------- phone --------------
        const phone = document.getElementById("phone");

        phone.addEventListener("input", function(event) {
            if (phone.validity.patternMismatch) {
                phone.setCustomValidity("Kövesse a mintát!");
                phone.reportValidity();
            } else {
                phone.setCustomValidity("");
            }
        });

        // -------------- repulojarata --------------
        const repulojarata = document.getElementById("repulojarata");

        repulojarata.addEventListener("input", function(event) {
            if (repulojarata.validity.valueMissing) {
                repulojarata.setCustomValidity("Válasszon ki egyet!");
                repulojarata.reportValidity();
            } else {
                repulojarata.setCustomValidity("");
            }
        });
    </script>
@endpush
