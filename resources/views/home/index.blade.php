@extends('layouts.app')

@section('title', 'Главная')

@section('main')
	<div class="main-container">
		<h1>{{ __('Главная') }}</h1>

		<div class="main-items">
			{{-- <div class="categories">
				<h2>{{ __('Категории') }}</h2>
				@foreach ($categories as $category)
					<a class="category nav-link" href="">
						{{ $category->name }}</a>
				@endforeach
			</div> --}}

			<div class="filter">
				<h2><i class="fa-solid fa-filter"></i> {{ __('Фильтр') }}</h2>
				{{-- reset filters --}}
				@if (request()->input('filter.name') ||
						request()->input('filter.country_id') ||
						request()->input('filter.category_id') ||
						request()->input('sort'))
					<a class="btn btn-auth" href="{{ route('home') }}">{{ __('Сбросить') }}</a>
				@endif
				<form action="{{ route('home') }}" method="GET" class="form-filter">
					<input class="sort-radio" type="radio" name="sort" value="price" id="price"
						{{ request()->input('sort') == 'price' ? 'checked' : '' }}>
					<input class="sort-radio" type="radio" name="sort" value="name" id="name"
						{{ request()->input('sort') == 'name' ? 'checked' : '' }}>
					<input class="sort-radio" type="radio" name="sort" value="created_at" id="created_at"
						{{ request()->input('sort') == 'created_at' ? 'checked' : '' }}>

					{{-- <div class="filter-item">
						<label for="sort">{{ __('Сортировать по') }}</label>
						<select name="sort" id="sort" style="font-family:'Unbounded', 'Font Awesome 6 Free'">
							<option value="">&#xf0dc; {{ __('Выберите') }}</option>
							<option value="price" {{ request()->input('sort') == 'price' ? 'selected' : '' }}>
								&#xf884; {{ __('Цене') }}</option>
							<option value="name" {{ request()->input('sort') == 'name' ? 'selected' : '' }}>
								&#xf15d; {{ __('Названию') }}</option>
							<option value="created_at" {{ request()->input('sort') == 'created_at' ? 'selected' : '' }}>
								&#xf162; {{ __('Году') }} </option>
						</select>
						<div class="sort-items">
							<div class="sort-item">
								<div class="tooltip">
									<input class="sort-radio" type="radio" name="sort" value="price" id="price"
										{{ request()->input('sort') == 'price' ? 'checked' : '' }}>
									<label class="sort-btn" for="price">
										<i class="fa-solid fa-ruble-sign"></i>
									</label>
									<span class="tooltiptext">{{ __('Цене') }}</span>
								</div>
							</div>
							<div class="sort-item">
								<div class="tooltip">
									<input class="sort-radio" type="radio" name="sort" value="name" id="name"
										{{ request()->input('sort') == 'name' ? 'checked' : '' }}>
									<label class="sort-btn" for="name">
										<i class="fa-solid fa-a"></i>
									</label>
									<span class="tooltiptext">{{ __('Названию') }}</span>
								</div>
							</div>
							<div class="sort-item">
								<div class="tooltip">
									<input class="sort-radio" type="radio" name="sort" value="created_at" id="created_at"
										{{ request()->input('sort') == 'created_at' ? 'checked' : '' }}>
									<label class="sort-btn" for="created_at">
										<i class="fa-solid fa-calendar-days"></i>
									</label>
									<span class="tooltiptext">{{ __('Году') }}</span>
								</div>
							</div>
						</div>
					</div> --}}
					<div class="filter-item">
						<label for="name">{{ __('Название') }}</label>
						<input type="text" name="filter[name]" id="name" value="{{ request()->input('filter.name') }}"
							placeholder="{{ __('Введите название') }}">
					</div>
					<div class="filter-item">
						<label for="country">{{ __('Страна') }}</label>
						<select name="filter[country_id]" id="country">
							<option value="">{{ __('Выберите страну') }}</option>
							@foreach ($countries as $country)
								<option value="{{ $country->id }}"
									{{ request()->input('filter.country_id') == $country->id ? 'selected' : '' }}>
									{{ $country->name }}
								</option>
							@endforeach
						</select>
					</div>
					<div class="filter-item">
						<label for="category">{{ __('Категория') }}</label>
						<select name="filter[category_id]" id="category">
							<option value="">{{ __('Выберите категорию') }}</option>
							@foreach ($categories as $category)
								<option value="{{ $category->id }}"
									{{ request()->input('filter.category_id') == $category->id ? 'selected' : '' }}>
									{{ $category->name }}
								</option>
							@endforeach
						</select>
					</div>
					<div class="filter-item">
						<label for="sort">{{ __('Сортировать по') }}</label>
						{{-- <select name="sort" id="sort" style="font-family:'Unbounded', 'Font Awesome 6 Free'">
								<option value="">&#xf0dc; {{ __('Выберите') }}</option>
								<option value="price" {{ request()->input('sort') == 'price' ? 'selected' : '' }}>
									&#xf884; {{ __('Цене') }}</option>
								<option value="name" {{ request()->input('sort') == 'name' ? 'selected' : '' }}>
									&#xf15d; {{ __('Названию') }}</option>
								<option value="created_at" {{ request()->input('sort') == 'created_at' ? 'selected' : '' }}>
									&#xf162; {{ __('Году') }} </option>
							</select> --}}
						<div class="sort-items">
							<div class="sort-item">
								<div class="tooltip">
									<button class="sort-btn {{ request()->input('sort') == 'price' ? 'active' : '' }}" type="submit"
										name="sort" value="price">
										<i class="fa-solid fa-ruble-sign"></i>
									</button>
									<span class="tooltiptext">{{ __('Цене') }}</span>
								</div>
							</div>
							<div class="sort-item">
								<div class="tooltip">
									<button class="sort-btn {{ request()->input('sort') == 'name' ? 'active' : '' }}" type="submit" name="sort"
										value="name">
										<i class="fa-solid fa-a"></i>
									</button>
									<span class="tooltiptext">{{ __('Названию') }}</span>
								</div>
							</div>
							<div class="sort-item">
								<div class="tooltip">
									<button class="sort-btn {{ request()->input('sort') == 'created_at' ? 'active' : '' }}" type="submit"
										name="sort" value="created_at">
										<i class="fa-solid fa-calendar-days"></i>
									</button>
									<span class="tooltiptext">{{ __('Году') }}</span>
								</div>
							</div>
						</div>
					</div>
					<div class="filter-item">
						<button id="btn-search" class="btn btn-auth" type="submit">{{ __('Применить') }}</button>
					</div>
				</form>
			</div>
			<div class="main-blocks">
				<div class="product-items">
					@if ($products->count() == 0)
						<div class="product-not-found">
							<h2>{{ __('Товары не найдены') }}</h2>
						</div>
					@endif
					@foreach ($products as $product)
						<div class="product parallax" onclick="location.href='{{ route('home.show', $product->id) }}'">
							<img src="images/{{ $product->image }}" alt="" class="product-blur">
							<div class="product-image">
								<img src="images/{{ $product->image }}" alt="{{ $product->name }}">
							</div>
							<div class="product-info">
								<div class="product-name">
									<h3>{{ $product->name }}</h3>
								</div>
								<div class="product-price">
									{{ number_format($product->price, 0, ',', ' ') }} &#8381;
								</div>
								<div class="product-subcategory">
									<div class="product-item">
										{{ $product->category->name }}
									</div>
									<div class="product-item">
										{{ $product->country->name }}
									</div>
								</div>
								{{-- add to cart --}}
								<form action="{{ route('cart.add') }}" method="POST">
									@csrf
									<input type="hidden" name="id" value="{{ $product->id }}">
									<input type="hidden" name="quantity" value="1" min="1">
									<button type="submit" class="btn btn-auth">
										{{ __('В корзину') }}
									</button>
								</form>
							</div>
						</div>
					@endforeach
				</div>
				@if (!request()->input('filter'))
					<button id="load-more" class="btn btn-auth">
						{{ __('Загрузить еще товары') }}
					</button>
				@endif
				{{-- {{ $products->appends(request()->query())->links() }} --}}
				{{ $products->links() }}
			</div>
		</div>
	</div>
@endsection
@push('scripts')
	<script>
		$(document).ready(function() {
			$('.sort-btn').each(function() {
				if ($(this).attr('value') == '{{ request()->input('sort') }}') {
					$(this).click(function() {
						$(this).removeClass('active');
						$(this).attr('value', '');
					});
				}
			});
		});

		$('#load-more').click(function() {
			var url = "{{ route('products.load-more') }}";
			var skip = $('.product').length;
			var limit = 4;
			$.get(url, {
				skip: skip,
				limit: limit
			}, function(data) {
				if (data.products.length > 0) {
					var products = '';
					$.each(data.products, function(index, product) {
						products +=
							'<div class="product parallax" onclick="location.href=\'{{ route('home.show', '') }}/' +
							product.id + '\'"><img src="images/' + product.image +
							'" alt="" class="product-blur"><div class="product-image"><img src="images/' +
							product.image + '" alt="' + product.name +
							'"></div><div class="product-info"><div class="product-name"><h3>' +
							product.name +
							'</h3></div><div class="product-price">' + product.price +
							' &#8381;</div><div class="product-subcategory"><div class="product-item">' +
							product.category.name + '</div><div class="product-item">' + product
							.country.name +
							'</div></div><form action="{{ route('cart.add') }}" method="POST">@csrf<input type="hidden" name="id" value="' +
							product.id +
							'"><input type="hidden" name="quantity" value="1" min="1"><button type="submit" class="btn btn-auth">{{ __('В корзину') }}</button></form></div></div>';
					});
					$('.product-items').append(products);
					if (!data.hasMore) {
						$('#load-more').hide();
					}
				} else {
					$('#load-more').hide();
				}
			});
		});
	</script>
@endpush
