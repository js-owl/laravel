<x-layout.main title="Trashed cars">
    <a href="{{ route('cars.index') }}">go to cars</a>
    <hr>
    <div class="row">
        @foreach($cars as $car)
        <div class="col m-3">
            <h3>{{ $car->brand }} {{ $car->model }}</h3>
            <x-form method="put" :action="route('cars.restore', [$car->id])">
                <button class="btn btn-success">restore</button>
            </x-form>
            <a href="{{ route('cars.show', [$car->id]) }}">show</a>
        </div>
        @endforeach
    </div>
</x-layout.main>

