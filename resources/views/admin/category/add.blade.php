@extends('layouts.app')

@section('title', 'Все категории')

@section('main')
	<div class="main-container">
		<h1>{{ __('Все категории') }}</h1>
		{{-- form with add image --}}

		<div class="admin-container">
			@include('admin.sidebar')
			<div class="admin-content">
				<div class="bottom-container">
					<form method="POST" action="{{ route('category.store') }}" class="form" enctype="multipart/form-data">
						@csrf
						<div class="form-container">
							<div class="form-group">
								<label for="name" class="floatingInput" disabled>
									{{ __('Название категории') }}
								</label>

								<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required
									autocomplete="name" autofocus>
							</div>
							@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							<div class="form-group mb-0">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-auth">
										{{ __('Добавить') }}
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
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
