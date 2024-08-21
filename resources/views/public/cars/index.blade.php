<x-layout.guest title="Cars catalog">
    <div class="row">
        @foreach($cars as $car)
        <div class="col m-3">
            <em>{{ $car->brand->country->title}}</em>
            <h3>{{ $car->brand->title }} {{ $car->id }}</h3>
            <a href="{{ route('cars.show', [$car->id]) }}">show</a> |
            @can('cars')
                <a href="{{ route('cars.edit', [$car->id]) }}">edit</a>
            @endif
        </div>
        @endforeach
    </div>
</x-layout.guest>

