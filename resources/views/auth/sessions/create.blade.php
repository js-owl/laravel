<x-layout.main title="enter to site">
    <x-form method="post" action="{{ route('auth.sessions.store') }}">
        <div class="mb-3"><x-form-input name="email" label="Email" /></div>
        <div class="mb-3"><x-form-input name="password" label="Password" type='password' /></div>
        <div class="mb-3"><x-form-checkbox name="remember" label="Remember" /></div>
        <div class="mb-3"><button class="btn btn-success">Войти</button></div>
    </x-form>
</x-layout.main>
