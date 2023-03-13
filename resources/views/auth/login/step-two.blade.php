@extends('layouts.app')

@section('title', 'Авторизация')

@section('main')
	<div class="main-container">
		<h1>{{ __('Введите пароль') }}</h1>

		<form method="POST" action="{{ route('login.step-two') }}" class="form">
			@csrf
			<div class="form-container">
				<div class="form-group form-edit">
					<span class="form-control span-login">
						{{ session('login') }}
					</span>
					<input id="login" type="text" class="form-control filled" style="display: none" name="login"
						value="{{ session('login') }}" required autocomplete="login" disabled>

					<a href="{{ route('login') }}" class="edit-login">
						{{-- {{ __('Изменить') }} --}}
						<div class="tooltip">
							<i class="fa-solid fa-pen-to-square"></i>
							<span class="tooltiptext">{{ __('Изменить') }}</span>
						</div>
					</a>
				</div>
				<div class="form-group">
					<label for="password" class="floatingInput" disabled>
						{{ __('Пароль') }}
					</label>

					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
						required autocomplete="current-password" autofocus>
				</div>

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
