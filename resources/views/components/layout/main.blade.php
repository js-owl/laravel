@props([
    'title',
    'h1' => null
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.scss'])
</head>
<body>
    <header>
        <div class="container border-bottom pb-2">
            <div class="row">
                <div class="col"><div class="alert">Logo</div> </div>
                <div class="col">
                    @auth
                        link to office
                    @else
                        <a href="{{ route('auth.sessions.create') }}">Login</a>
                    @endif
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        @if (session('alert'))
            <div class="alert alert-info" role="alert">
                <div>
                    {{ session('alert') }}
                </div>
            </div>
        @endif
        <h1>{{ $h1 ?? $title }}</h1>
        {{ $slot }}
    </div>
    <footer>
        <div class="container border-top pt-2">
            Footer
        </div>
    </footer>
    @vite(['resources/js/app.js'])
</body>
</html>

