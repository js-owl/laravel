<x-layout.main title="Account">
    <x-form method="delete" action="{{ route('auth.sessions.destroy') }}">
        <button class="btn btn-danger">exit</button>
    </x-form>
</x-layout.main>