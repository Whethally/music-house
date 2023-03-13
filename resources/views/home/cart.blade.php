@extends('layouts.app')

@section('title', 'Главная')

@section('main')
	<div class="main-container">
		{{-- if cart is empty --}}
		@if (Cart::isEmpty())
			<div class="cart-empty">
				<h2>{{ __('Корзина пуста') }}</h2>
				<a href="{{ route('home') }}" class="btn btn-auth">{{ __('Вернуться на главную') }}</a>
			</div>
		@else
			<h1>{{ __('Корзина') }}</h1>

			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="col">
							{{ __('Картинка') }}
						</th>
						<th scope="col">
							{{ __('Название') }}
						</th>
						<th scope="col">
							{{ __('Цена') }}
						</th>
						<th scope="col">
							{{ __('Количество') }}
						</th>
						<th scope="col">
							{{ __('Всего') }}
						</th>
						<th scope="col">
							{{ __('Действия') }}
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($items as $item)
						<tr>
							<td>
								<img src="{{ asset('images/' . $item->getOptions('image')) }}" alt="" width="100">
							</td>
							<td>{{ $item->get('title') }}</td>
							<td>
								{{ number_format($item->get('price'), 0, ',', ' ') }}
								<span class="rub">&#8381;</span>
							</td>
							<td>
								{{-- <input type="number" name="quantity" value="{{ $item->get('quantity') }}" min="1"
								max="{{ $item->get('amount_quantity') }}"> --}}
								{{-- add quantity if value is change --}}
								<form class="cart-form" action="{{ route('cart.update', $item->get('hash')) }}" method="POST">
									@csrf
									<input class="cart-input" type="number" name="quantity" value="{{ $item->get('quantity') }}" min="1"
										max="{{ $item->get('amount_quantity') }}">
									<button type="submit" class="btn btn-auth td-btn_bottom cart-button">
										{{-- update icon --}}
										<i class="fa-solid fa-sync"></i>
									</button>
								</form>
							</td>
							<td>
								{{ number_format($item->get('price') * $item->get('quantity'), 0, ',', ' ') }}
								<span class="rub">&#8381;</span>
							</td>
							<td class="td-btns">
								{{-- delete product with comfirm --}}
								<div class="tooltip">
									<form action="{{ route('cart.remove', $item->get('hash')) }}" method="POST">
										@csrf
										@method('DELETE')
										<button type="submit" onclick="return confirm('{{ __('Вы уверены что хотите удалить товар?') }}')"
											class="btn btn-auth td-btn_bottom">
											<i class="fa-solid fa-trash"></i>
										</button>
										<span class="tooltiptext">{{ __('Удалить') }}</span>
									</form>
								</div>
							</td>
						</tr>
					@endforeach

					<tr>
						<td colspan="4" class="text-right">
							{{ __('Итого') }}
						</td>
						<td>
							{{ number_format(Cart::name('shopping')->getTotal(), 0, ',', ' ') }}
							<span class="rub">&#8381;</span>
						</td>
						<td>
							<div class="tooltip">
								<form action="{{ route('cart.clear') }}" method="POST">
									@csrf
									@method('DELETE')
									<button type="submit" onclick="return confirm('{{ __('Вы уверены что хотите очистить корзину?') }}')"
										class="btn btn-auth td-btn_bottom">
										<i class="fa-solid fa-trash"></i>
									</button>
									<span class="tooltiptext">{{ __('Очистить') }}</span>
								</form>
							</div>
						</td>
					</tr>
				</tbody>
				<tfoot>
					<td colspan="6" class="text-right">
						<a href="{{ route('home') }}" class="btn btn-auth">{{ __('Вернуться на главную') }}</a>
						<a href="{{ route('cart.checkout') }}" class="btn btn-auth">{{ __('Оформить заказ') }}</a>
					</td>
				</tfoot>
			</table>
		@endif
	</div>
@endsection
