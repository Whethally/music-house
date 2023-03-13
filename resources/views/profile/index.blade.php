@extends('layouts.app')

@section('title', 'Профиль')

@section('main')
	<div class="main-container">
		<h1>{{ __('Профиль') }}</h1>

		<div class="admin-container">
			@include('admin.sidebar')
			<div class="profile">
				<div class="form-group form-edit">
					<span for="password" class="floatingInput focused" disabled>
						{{ __('ФИО') }}
					</span>
					<span>
						{{ $user->getFullNameAttribute() }}
					</span>

					<a href="{{ route('login') }}" class="edit-login">
						<div class="tooltip">
							<i class="fa-solid fa-pen-to-square"></i>
							<span class="tooltiptext">{{ __('Изменить') }}</span>
						</div>
					</a>
				</div>

				<div class="form-group form-edit">
					<span for="password" class="floatingInput focused" disabled>
						{{ __('E-mail') }}
					</span>
					<span>
						{{ $user->email }}
					</span>

					<a href="{{ route('login') }}" class="edit-login">
						<div class="tooltip">
							<i class="fa-solid fa-pen-to-square"></i>
							<span class="tooltiptext">{{ __('Изменить') }}</span>
						</div>
					</a>
				</div>

				<div class="form-group form-edit">
					<span for="password" class="floatingInput focused" disabled>
						{{ __('Дата регистрации') }}
					</span>
					<span>
						{{ $user->created_at->format('d.m.Y') }}
					</span>
				</div>
			</div>

			{{-- <div class="profile-orders">
				<h2>{{ __('Заказы') }}</h2>
				@if ($orders->count())
					@foreach ($orders as $order)
						<div class="profile-order">
							<div class="profile-order__title">
								{{ __('Заказ №') }}{{ $order->id }}
							</div>
							<div class="profile-order__items">
								@foreach ($order->items as $item)
									<div class="profile-order__item">
										<div class="profile-order__item-title">
											{{ $item->product->name }}
										</div>
										<div class="profile-order__item-price">
											{{ $item->product->price }} {{ __('руб.') }}
										</div>
										<div class="profile-order__item-quantity">
											{{ $item->quantity }} {{ __('шт.') }}
										</div>
									</div>
								@endforeach
							</div>
							<div class="profile-order__total">
								{{ __('Итого') }}: {{ $order->total }} {{ __('руб.') }}
							</div>
						</div>
					@endforeach
				@else
					<div class="profile-order">
						{{ __('Заказов нет') }}
					</div>
				@endif
			</div> --}}

			{{-- create product --}}
		</div>
	</div>
@endsection
