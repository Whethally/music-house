@extends('layouts.app')

@section('title', 'Оформление заказа - Шаг 1')

@section('main')
	<div class="main-container">
		<h1>{{ __('Оформление заказа ') }}</h1>
		<h2>
			{{ __('Подтверждение') }}
		</h2>
		<form method="POST" action="{{ route('cart.checkout.step-one.store') }}" class="form">
			@csrf
			<div class="form-container">
				<div class="form-group">
					<label for="password" class="floatingInput" disabled>
						{{ __('Подтвердите пароль') }}
					</label>

					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
						required autocomplete="password" autofocus>
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
