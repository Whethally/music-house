@extends('layouts.app')

@section('title', 'Изменить товар')

@section('main')
	<div class="main-container">
		<h1>{{ __('Изменить товар') }}</h1>
		{{-- form with add image --}}

		<div class="admin-container">
			@include('admin.sidebar')
			<div class="admin-content">
				<div class="bottom-container">
					<form method="POST" action="{{ route('dashboard.update_product', $product->id) }}" class="form"
						enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-container">
							<div class="form-group">
								<label for="name" class="floatingInput" disabled>
									{{ __('Имя товара') }}
								</label>

								<input id="name" type="text" class="form-control" name="name" value="{{ $product->name }}" required
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

								<input id="description" type="text" class="form-control" name="description"
									value="{{ $product->description }}" required autocomplete="description" autofocus>
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

								<input id="price" type="text" class="form-control" name="price" value="{{ $product->price }}" required
									autocomplete="price" autofocus>
							</div>
							@error('price')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror

							<div class="form-group">
								{{-- choose image text instend input --}}
								<label class="form-edit" for="image" class="floatingInput">
									{{ __('Изменить изображение') }}
								</label>

								<input style="display: none;" id="image" type="file" class="form-control" name="image"
									value="{{ $product->image }}" autocomplete="image" autofocus>
							</div>
							@error('image')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror

							<div class="form-group">
								<label for="quantity" class="floatingInput" disabled>
									{{ __('Количество товара') }}
								</label>

								<input id="quantity" type="text" class="form-control" name="quantity" value="{{ $product->quantity }}"
									required autocomplete="quantity" autofocus>
							</div>
							@error('quantity')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror

							<div class="form-group">
								<label for="category_id" class="floatingInput" disabled>
									{{ __('Категория') }}
								</label>

								<select name="category_id" id="category_id" class="form-control">
									@foreach ($categories as $category)
										<option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
											{{ $category->name }}
										</option>
									@endforeach
								</select>
							</div>
							@error('category')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror

							<div class="form-group">
								{{-- country --}}
								<label for="country_id" class="floatingInput" disabled>
									{{ __('Страна') }}
								</label>

								<select name="country_id" id="country_id" class="form-control">
									@foreach ($countries as $country)
										<option value="{{ $country->id }}" {{ $country->id == $product->country_id ? 'selected' : '' }}>
											{{ $country->name }}
										</option>
									@endforeach
								</select>
							</div>
							@error('country')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror

							{{-- <div class="form-group">
								<label for="status_id" class="floatingInput" disabled>
									{{ __('Статус') }}
								</label>

								<select name="status_id" id="status_id" class="form-control">
									@foreach ($statuses as $status)
										<option value="{{ $status->id }}" {{ $status->id == $product->status_id ? 'selected' : '' }}>
											{{ $status->name }}
										</option>
									@endforeach
								</select>
							</div> --}}

							<div class="form-group mb-0">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-auth">
										{{ __('Обновить') }}
									</button>
								</div>
							</div>
						</div>
					</form>
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

					// if input already filled
					input.each(function() {
						if ($(this).val() != '') {
							$(this).addClass('filled');
							$(this).parent().addClass('focused');
						}
					});
				});
			</script>
		@endpush
