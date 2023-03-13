@extends('layouts.app')

@section('title', 'Оформление заказа')

@section('main')
	<div class="main-container">
		<h1>
			{{ __('Оформление заказа') }}
		</h1>

		<table class="table">
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
							{{ $item->get('quantity') }}
						</td>
						<td>
							{{ number_format($item->get('price') * $item->get('quantity'), 0, ',', ' ') }}
							<span class="rub">&#8381;</span>
						</td>
					</tr>
				@endforeach
			</tbody>

			<tfoot>
				<tr>
					<td colspan="4">
						{{ __('Итого') }}
					</td>
					<td>
						{{ number_format(Cart::getTotal(), 0, ',', ' ') }}
						<span class="rub">&#8381;</span>
					</td>
				</tr>

				<tr>
					<td colspan="4">
						{{ __('Скидка') }}
					</td>
					<td>
						{{ number_format(Cart::getTotal() * 0, 0, ',', ' ') }}
						<span class="rub">&#8381;</span>
					</td>
				</tr>

				<tr>
					<td colspan="4">
						{{ __('К оплате') }}
					</td>
					<td>
						{{ number_format(Cart::getTotal() - Cart::getTotal() * 0, 0, ',', ' ') }}
						<span class="rub">&#8381;</span>
					</td>
				</tr>

				<tr>
					<td colspan="5" class="text-right">
						<a href="{{ route('home') }}" class="btn btn-auth">{{ __('Вернуться на главную') }}</a>
						<a href="{{ route('cart.clear') }}" class="btn btn-auth">{{ __('Очистить корзину') }}</a>
						<a href="{{ route('cart.checkout.step-one') }}" class="btn btn-auth">{{ __('Оформить заказ') }}</a>
					</td>
				</tr>
			</tfoot>
		</table>
	</div>
@endsection
