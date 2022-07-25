@extends('layout')
@section('content')
	<h1>Új repülőjárat létrehozása</h1>
	<form class="border border-light p-5" action="{{ route('flights.store') }}"  method="POST" id="flightCreateForm">
		@csrf

		<label for="number">Száma:</label>
		<input type="text" name="number" id="number" class="form-control mt-2 mb-4" maxlength="255" required>

		<label for="name">Neve:</label>
		<input type="text" name="name" id="name" class="form-control mt-2 mb-4" maxlength="255">

		<label for="destination">Célpont:</label>
		<input type="text" name="destination" id="destination" class="form-control mt-2 mb-4" maxlength="255">

		<label for="price">Ár:</label>
		<input type="number" name="price" id="price" class="form-control mt-2 mb-4" value="1" min="0" required>

		<label for="scheduled_departured_at">Tervezett indulási idő:</label>
		<input type="datetime-local" id="scheduled_departured_at" name="scheduled_departured_at" class="form-control mt-2 mb-4" value="2022-07-23T00:00" min="2022-07-23T00:00" max="2100-00-00T00:00">

		<label for="scheduled_arrived_at">Tervezett érkezési idő:</label>
		<input type="datetime-local" id="scheduled_arrived_at" name="scheduled_arrived_at" class="form-control mt-2 mb-4" value="2022-07-23T00:00" min="2022-07-23T00:00" max="2100-00-00T00:00">

		<label for="departed">Elindult?</label>
		<input type="checkbox" class="form-check mt-2 mb-4" name="departed" id="departed" class="mt-2 mb-4" value="0">

		<label for="active">Aktív?</label>
		<input type="checkbox" class="form-check mt-2 mb-4" name="active" id="active" class="mt-2 mb-4" value="0">

		<label for="delayed">Késett?</label>
		<input type="checkbox" class="form-check mt-2 mb-4" name="delayed" id="delayed" class="mt-2 mb-4" value="0">

		<label for="arrived_at">Tényleges érkezési idő:</label>
		<input type="datetime-local" id="arrived_at" name="arrived_at" class="form-control mt-2 mb-4" value="2022-07-23T23:00" min="2022-07-23T00:00" max="2100-00-00T00:00">

		<label for="airline_id">Légitársaság:</label>
		<select class="form-select mt-2 mb-4" name="airline_id" id="airline_id" class="form-control mt-2 mb-4" required>
		@foreach ($airlines as $airline)
			<option value="{{ $airline->id }}">{{ $airline->name }}</option>
		@endforeach
		</select>

		<label for="captain_id">Kapitány:</label>
		<select class="form-select mt-2 mb-4" name="captain_id" id="captain_id" class="form-control mt-2 mb-4" required>
		@foreach ($captains as $captain)
			<option value="{{ $captain->id }}">{{ $captain->name }}</option>
		@endforeach
		</select>
        <button class="btn btn-primary" id="submit-btn">Mentés</button>
		{{-- <input class="btn btn-info btn-block" type="submit" value="Mentés" dusk="flight-save-button"> --}}
	</form>
@endsection

@push('head-scripts')
    {{-- <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script> --}}
    <script src="{!! mix('js/app.js') !!}"></script>
@endpush

@push('scripts')
    <script>
        const validation = new JustValidate('#flightCreateForm');

        validation.addField('#scheduled_arrived_at', [{
            plugin: JustValidatePluginDate(() => ({
                // format: 'dd MMM yyyy',
                // isBefore: '15/12/2022',
                isAfter: document.getElementById('scheduled_departured_at').value
            })),
            errorMessage: 'A tervezett érkezési dátumnak/időnek a tervezett indulási dátum/idő után kell lennie.',
        }])
        .onSuccess((ev) => {
            ev.target.submit();
        });
    </script>
@endpush
