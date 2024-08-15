<x-layout.main  title="brand: #{{ $brand->id }}">
    <a href="{{ route('brands.index') }}">to index</a>
    <div>brand: {{ $brand->id }}</div>
    <div>brand: {{ $brand->title }}</div>
    <ul>
        @foreach($brand->cars as $car)
            <li>{{ $car->vin }}</li>
        @endforeach
    </ul>
    <x-form method="delete" action="{{ route('brands.destroy', [$brand->id]) }}">
        <button class="btn btn-danger">delete</button>
    </x-form>
</x-layout.main>