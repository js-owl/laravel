<x-layout.guest  title="car: #{{ $car->id }}">
    <a href="{{ route('home') }}">to index</a>
    <div>brand: {{ $car->brand->title }}</div>
    <div>model: {{ $car->model }}</div>
    <div>vin: {{ $car->vin }}</div>
    <div>{{ $car->transmission }}</div>
    <x-comments.create :id="$car->id" model="car" />
    <x-comments.viewer :model="$car" />
</x-layout.guest>