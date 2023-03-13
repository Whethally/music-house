<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
	<title>@yield('title', 'Главная') - {{ __('Music House') }}</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/fontawesome.min.css"
		integrity="sha512-cHxvm20nkjOUySu7jdwiUxgGy11vuVPE9YeK89geLMLMMEOcKFyS2i+8wo0FOwyQO/bL8Bvq1KMsqK4bbOsPnA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/solid.min.css"
		integrity="sha512-bdTSJB23zykBjGDvyuZUrLhHD0Rfre0jxTd0/jpTbV7sZL8DCth/88aHX0bq2RV8HK3zx5Qj6r2rRU/Otsjk+g=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="{{ asset('js/app.js') }}" defer></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/solid.min.js"
		integrity="sha512-Cw3lrAMFnu1XhNZB73mT27VptT/2szZ1sn2MLnPq+ATkY0qu16il+xEQdo4wDZCAVnO8QZ12547AfBZhO9M9cw=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
</head>

<body class="{{ session('theme', 'light') == 'dark' ? 'dark-mode' : '' }}">
	<header>
		@include('includes.header')
	</header>
	<main>
		@include('includes.alert')
		@yield('main')
	</main>
	<footer>
		@include('includes.footer')
	</footer>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
		integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	@stack('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"
		integrity="sha512-u1L7Dp3BKUP3gijgSRoMTNxmDl/5o+XOHupwwa7jsI1rMzHrllSLKsGOfqjYl8vrEG+8ghnRPNA/SCltmJCZpQ=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script>
		$(document).ready(function() {
			const tilt = $('.parallax').tilt({
				glare: true,
				maxGlare: .1,
				maxTilt: 3,
				scale: 1.05,
				speed: 1200,
			});
		});
	</script>
</body>

</html>
