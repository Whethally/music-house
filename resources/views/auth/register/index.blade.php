@extends('layouts.app')

@section('title', 'Регистрация')

@section('main')
	<div class="main-container">
		<h1>{{ __('Регистрация') }}</h1>

		<form method="POST" action="{{ route('register.store') }}" class="form">
			@csrf
			<div class="form-container">
				<div class="form-group">
					<label for="name" class="floatingInput" disabled>
						{{ __('Имя') }}
					</label>

					<input id="name" type="text" class="form-control" name="name" value="{{ old('login') }}" required
						autocomplete="name" autofocus>
				</div>
				@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror

				<div class="form-group">
					<label for="surname" class="floatingInput" disabled>
						{{ __('Фамилия') }}
					</label>

					<input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname"
						value="{{ old('surname') }}" required autocomplete="surname">
				</div>
				@error('surname')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror

				<div class="form-group">
					<label for="patronymic" class="floatingInput" disabled>
						{{ __('Отчество') }}
					</label>

					<input id="patronymic" type="text" class="form-control @error('patronymic') is-invalid @enderror"
						name="patronymic" value="{{ old('patronymic') }}" required autocomplete="patronymic">
				</div>
				@error('patronymic')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror

				<div class="form-group">
					<label for="login" class="floatingInput" disabled>
						{{ __('Логин') }}
					</label>

					<input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login"
						value="{{ old('login') }}" required autocomplete="login">
				</div>
				@error('login')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror

				<div class="form-group">
					<label for="email" class="floatingInput" disabled>
						{{ __('Email') }}
					</label>

					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
						value="{{ old('email') }}" required autocomplete="email">
				</div>
				@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror

				<div class="form-group">
					<label for="password" class="floatingInput" disabled>
						{{ __('Пароль') }}
					</label>

					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
						required autocomplete="password">
				</div>
				@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror

				<div class="form-group">
					<label for="password-confirm" class="floatingInput" disabled>
						{{ __('Подтвердите пароль') }}
					</label>

					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
						autocomplete="new-password">
				</div>
				@error('password_confirmation')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror

				<div class="form-group">
					<div class="row">
						<input name="rules" id="rules" type="checkbox" class="js-switch rules-checkbox" />
						<label for="rules" class="required">
							{{ __('Я согласен с') }}
							<a href="#" class="nav-link" target="_blank">{{ __('правилами') }}</a>
							{{ __('сайта') }}
						</label>
					</div>
					@error('rules')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group mb-0">
					<div class="col-md-6 offset-md-4">
						<button type="submit" class="btn btn-auth">
							{{ __('Регистрация') }}
						</button>
					</div>
				</div>
			</div>
		</form>

	</div>
@endsection

@push('scripts')
	<script>
		$(document).ready(function() {
			const input = $('.form-control');

			$('.rules-checkbox').on('change', function() {
				if ($(this).is(':checked')) {
					$(this).parent().find('label').removeClass('required');
				} else {
					$(this).parent().find('label').addClass('required');
				}
			});

			input.each(function() {
				const inputValue = $(this).val();
				if (inputValue == '') {
					$(this).parent().find('.floatingInput').addClass('required');
				}
			});

			input.on("input blur", function() {
				const inputValue = $(this).val();
				if (inputValue == '') {
					$(this).removeClass('filled');
					$(this).parent().removeClass('focused');
				} else {
					$(this).addClass('filled');
					$(this).parent().addClass('focused');
					$(this).parent().find('.floatingInput').removeClass('required');
				}
			});

			// add focused class for each input if it has value
			input.each(function() {
				const inputValue = $(this).val();
				if (inputValue != '') {
					$(this).addClass('filled');
					$(this).parent().addClass('focused');
				}
			});
		});
	</script>
@endpush
