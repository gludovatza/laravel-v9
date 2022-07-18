@extends('layout')
@section('content')
    <h1>Új légitársaság létrehozása</h1>
    <form class="border border-light p-5"
        action="{{ route('airlines.store') }}"
        method="POST"
        name="legitarsasagLetrehozo"
        onSubmit="return validateForm()">
        @csrf
        <label for="legitarsasagneve">Légitársaság neve:</label>
        <input type="text"
            name="legitarsasagneve"
            id="legitarsasagneve"
            class="form-control mt-2 mb-4"
            placeholder="Légitársaság neve"
            required
            >

        <label for="cities">Telephelyei (városai):</label>
        <select class="form-select mt-2 mb-4"
            name="cities[]"
            id="cities"
            multiple
            required
            >
            @foreach ($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>

        <input class="btn btn-info btn-block"
            type="submit"
            value="Mentés">
    </form>
@endsection

@push('scripts')
    <script>
        function validateForm() {
            let x = document.forms["legitarsasagLetrehozo"]["legitarsasagneve"].value;
            if (x == "") {
                alert("A nevet kötelező kitölteni");
                return false;
            }
            console.log(document.forms["legitarsasagLetrehozo"]["cities[]"]);
            if (document.forms["legitarsasagLetrehozo"]["cities[]"].selectedOptions.length < 1) {
                alert("Legalább 1 telephelyet állítson be");
                return false;
            }
        }
    </script>
@endpush
