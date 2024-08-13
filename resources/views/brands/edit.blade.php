<x-layout.main title="Edit brand #{{$brand->id}}">
    <x-form method="put" action="{{ route('brands.update', [$brand->id]) }}">
        @bind($brand)
            @include('brands.form')
        @endbind
        <div class="mb-3"><button class="btn btn-success">Сохранить</button></div>
    </x-form>
</x-layout.main>
