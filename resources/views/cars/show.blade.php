<x-layout.main  title="car: #{{ $car->id }}">
    <div>brand: {{ $car->brand }}</div>
    <div>model: {{ $car->model }}</div>
    <div>{{ $car->transmission }}</div>
    <x-form method="delete" action="{{ route('cars.destroy', [$car->id]) }}">
        <button class="btn btn-danger">delete</button>
    </x-form>
</x-layout.main>