@props([
	'title',
	'h1' => null	
])

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $title }}</title>
	@vite(['resources/css/app.scss'])
</head>
<body>
	<header>
		<div class="container border-bottom pb-2">
			<div class="row">
				<div class="col"><div class="alert">Logo</div></div>
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
	<div class="container py-2">
		{{ $slot }}
	</div>
	<footer>
		<div class="container border-top pt-2">
			Footer
		</div>
	</footer>
	<script>
		window.appData = {{ Js::from([ 'apiRoot' => '/api' ]) }}
	</script>
	@vite(['resources/js/app.js'])
</body>
</html>

