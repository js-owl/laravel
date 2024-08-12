<x-layout.main title="Cars catalog">
    <a href="{{ route('cars.create') }}">create car</a>
    <hr>
    <div class="row">
        @foreach($cars as $car)
        <div class="col m-3">
            <h3>{{ $car->brand }} {{ $car->model }}</h3>
            <a href="{{ route('cars.show', [$car->id]) }}">show</a>
            <a href="{{ route('cars.edit', [$car->id]) }}">edit</a>
        </div>
        @endforeach
    </div>
</x-layout.main>

