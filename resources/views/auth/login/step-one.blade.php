@extends('layouts.app')

@section('title', 'Авторизация')

@section('main')
	<div class="main-container">
		@if (session('login'))
			<h1>{{ __('С возвращением') }}</h1>
		@else
			<h1>{{ __('Авторизация') }}</h1>
		@endif

		<form method="POST" action="{{ route('login.step-one') }}" class="form">
			@csrf
			<div class="form-container">
				<div class="form-group">
					<label for="login" class="floatingInput" disabled>
						{{ __('Логин') }}
					</label>

					<input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login"
						value="{{ session('login') }}" required autocomplete="login" autofocus>
				</div>

				{{-- <div class="form-group">
					<label for="password" class="floatingInput" disabled>
						{{ __('Пароль') }}
					</label>

					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
						required autocomplete="current-password">
				</div> --}}

				@if ($errors->any())
					<div class="invalid-feedback">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
			</div>

			<div class="form-group mb-0">
				<div class="col-md-6 offset-md-4">
					<button type="submit" class="btn btn-auth">
						{{ __('Войти') }}
					</button>
				</div>
			</div>
		</form>
	</div>

@endsection

@push('scripts')
	<script>
		$(document).ready(function() {
			const input = $('.form-control');

			input.on("input blur", function() {
				const inputValue = $(this).val();
				if (inputValue == '') {
					$(this).removeClass('filled');
					$(this).parent().removeClass('focused');
				} else {
					$(this).addClass('filled');
					$(this).parent().addClass('focused');
				}
			});
		});
	</script>
@endpush
