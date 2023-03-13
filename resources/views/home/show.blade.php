@extends('layouts.app')

@section('title', "$product->name")

@section('main')
	<div class="main-container">
		<div class="main-header">
			<div class="back">
				<a href="{{ route('home') }}" class="btn btn-auth">{{ __('Назад') }}</a>
			</div>
			<h1>{{ __('Информация о товаре') }} <i class="fa-solid fa-circle-info"></i></h1>
		</div>

		<div class="main-items">
			<img class="product-image" src="/images/{{ $product->image }}" alt="{{ $product->name }}">
			<div class="product-info">
				<div class="product-name">
					<h3>
						{{ $product->name }}</h3>
				</div>
				<div class="product-price">
					{{ number_format($product->price, 0, ',', ' ') }} &#8381;
				</div>
				<div class="product-subcategory">
					<div class="product-category">
						{{ $product->category->name }}
					</div>
					<div class="product-country">
						{{ $product->country->name }}
					</div>
				</div>
				<form action="{{ route('cart.add') }}" method="POST">
					@csrf
					<input type="hidden" name="id" value="{{ $product->id }}">
					<input class="cart-input" type="number" name="quantity" value="1" min="1">
					<button type="submit" class="btn btn-auth">
						{{ __('В корзину') }}
					</button>
				</form>
			</div>
		</div>
	</div>
@endsection
