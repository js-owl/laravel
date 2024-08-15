<x-layout.main title="Cars catalog">
    <a href="{{ route('cars.create') }}">create car</a>
    <a href="{{ route('cars.trashed') }}">car trashed</a>
    <hr>
    <div class="row">
        @foreach($cars as $car)
        <div class="col m-3">
            <em>{{ $car->brand->country->title}}</em>
            <h3>{{ $car->brand->title }} {{ $car->model }}</h3>
            <a href="{{ route('cars.show', [$car->id]) }}">show</a> |
            <a href="{{ route('cars.edit', [$car->id]) }}">edit</a>
        </div>
        @endforeach
    </div>
</x-layout.main>

