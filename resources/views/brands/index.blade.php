<x-layout.main title="brands catalog">
    <a href="{{ route('brands.create') }}">create brand</a>
    <hr>
    @if($brands->isNotEmpty())
    <div class="row">
        @foreach($brands as $brand)
        <div class="col col-12 mt-3">
            <h3>{{ $brand->title }} {{ $brand->description }}</h3>
            <a href="{{ route('brands.show', [$brand->id]) }}">show</a> |
            <a href="{{ route('brands.edit', [$brand->id]) }}">edit</a>
        </div>
        @endforeach
    </div>
    @else
        <div class="alert alert-info">Записей не найдено</div>
    @endif
</x-layout.main>

