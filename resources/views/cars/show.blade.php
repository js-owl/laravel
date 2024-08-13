<x-layout.main  title="car: #{{ $car->id }}">
    <a href="{{ route('cars.index') }}">to index</a>
    <div>brand: {{ $car->brand }}</div>
    <div>model: {{ $car->model }}</div>
    <div>vin: {{ $car->vin }}</div>
    <div>{{ $car->transmission }}</div>
    <x-form method="delete" action="{{ route('cars.destroy', [$car->id]) }}">
        <button class="btn btn-danger">delete</button>
    </x-form>
</x-layout.main>