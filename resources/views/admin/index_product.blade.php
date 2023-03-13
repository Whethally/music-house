@extends('layouts.app')

@section('title', 'Добавить товар')

@section('main')
	<div class="main-container">
		<h1>{{ __('Добавить товар') }}</h1>
		{{-- form with add image --}}

		<div class="admin-container">
			@include('admin.sidebar')
			<div class="admin-content">
				<div class="bottom-container">
					<form method="POST" action="{{ route('admin.store_product') }}" class="form" enctype="multipart/form-data">
						@csrf
						<div class="form-container">
							<div class="form-group">
								<label for="name" class="floatingInput" disabled>
									{{ __('Имя товара') }}
								</label>

								<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required
									autocomplete="name" autofocus>
							</div>
							@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror

							<div class="form-group">
								<label for="description" class="floatingInput" disabled>
									{{ __('Описание товара') }}
								</label>

								<input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}"
									required autocomplete="description" autofocus>
							</div>
							@error('description')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror

							<div class="form-group">
								<label for="price" class="floatingInput" disabled>
									{{ __('Цена товара') }}
								</label>

								<input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}" required
									autocomplete="price" autofocus>
							</div>
							@error('price')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror

							<div class="form-group">
								{{-- <span class="form-control span-login" style="cursor: pointer" onclick="document.getElementById('image').click()">
									{{ __('Выберите картинку') }}
								</span> --}}
								<input id="image" type="file" class="form-control" name="image" value="{{ old('image') }}" required
									autocomplete="image" autofocus>
							</div>
							@error('image')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror

							{{-- quantity product --}}
							<div class="form-group">
								<label for="quantity" class="floatingInput" disabled>
									{{ __('Количество товара') }}
								</label>

								<input id="quantity" type="text" class="form-control" name="quantity" value="{{ old('quantity') }}" required
									autocomplete="quantity" autofocus>
							</div>
							@error('quantity')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror

							{{-- category product --}}
							<div class="form-group">
								<select name="category_id" id="category_id" class="form-control">
									<option disabled selected>{{ __('Выберите категорию') }}</option>
									@foreach ($categories as $category)
										<option value="{{ $category->id }}">{{ $category->name }}</option>
									@endforeach
								</select>
							</div>
							@error('category')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror

							<div class="form-group">
								<select name="country_id" id="country_id" class="form-control">
									<option disabled selected>{{ __('Выберите страну') }}</option>
									@foreach ($countries as $country)
										<option value="{{ $country->id }}">{{ $country->name }}</option>
									@endforeach
								</select>
							</div>
							@error('country')
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
