<x-layout.main title="Edit car #{{$car->id}}">
    <x-form method="put" action="{{ route('cars.update', [$car->id]) }}">
        @bind($car)
            @include('cars.form')
        @endbind
        <div class="mb-3"><button class="btn btn-success">Сохранить</button></div>
    </x-form>
</x-layout.main>
