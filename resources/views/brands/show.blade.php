<x-layout.main  title="brand: #{{ $brand->id }}">
    <a href="{{ route('brands.index') }}">to index</a>
    <div>brand: {{ $brand->title }}</div>
    <x-form method="delete" action="{{ route('brands.destroy', [$brand->id]) }}">
        <button class="btn btn-danger">delete</button>
    </x-form>
</x-layout.main>