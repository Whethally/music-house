@extends('layouts.app')

@section('title', 'Заказы')

@section('main')
	<div class="main-container">
		<h1>{{ __('Заказы') }}</h1>

		<div class="admin-container">
			@include('admin.sidebar')

			@if (count($orders) == 0)
				<div class="profile-order__items">
					<div class="profile-order__item">
						<div class="profile-order__title">
							{{ __('У вас нет заказов') }}
						</div>

						<div class="profile-order__item-title">
							{{ __('Вы можете сделать заказ на странице') }} <a class="btn btn-auth" href="/">{{ __('Главная') }}</a>
						</div>
					</div>
				</div>
			@else
				<div class="profile-orders">
					@foreach ($orders as $order)
						<a href="" class="order-box">
							<img class="img-box" src="/images/{{ $order->product->image }}" alt="">
							<div class="profile-order">
								<div class="profile-order__title">
									{{ __('Заказ №') }}{{ $order->id }}
								</div>
								<div class="profile-order__items">
									<div class="profile-order__item">
										<div class="profile-order__item-title">
											{{ $order->product->name }}
										</div>
									</div>
								</div>
								<div class="profile-order__item-quantity">
									{{ $order->quantity }} {{ __('шт.') }}
								</div>
								<div class="profile-order__total">
									{{ __('Итого') }}: {{ $order->total }} {{ __('руб.') }}
								</div>
								{{-- status --}}
								<div class="profile-order__status">
									{{ __('Статус') }}: {{ $order->status->name }}
								</div>
								<div class="profile-order__date">
									{{ __('Создан') }}: {{ $order->created_at->diffForHumans() }}
								</div>
							</div>

							<div class="profile-order__buttons">
								@if ($order->status_id == 1)
									<form action="{{ route('orders.cancel', $order->id) }}" method="POST">
										@csrf
										<input type="hidden" name="id" value="{{ $order->id }}">
										<button type="submit" class="btn btn-auth">
											{{ __('Отменить') }}
										</button>
									</form>
								@endif
							</div>
						</a>
					@endforeach
				</div>
			@endif
		</div>
	</div>
@endsection
