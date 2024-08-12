<x-layout.main title="create car">
    <x-form method="post" action="{{ route('cars.store') }}">
        @include('cars.form')
        <div class="mb-3"><button class="btn btn-success">Сохранить</button></div>
    </x-form>
</x-layout.main>

