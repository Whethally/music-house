@extends('layouts.app')

@section('title', 'Все заказы')

@section('main')
	<div class="main-container">
		<h1>{{ __('Все заказы') }}</h1>

		<div class="admin-container">
			@include('admin.sidebar')
			<div class="admin-content">
				<div class="bottom-container">
					{{-- table all product --}}
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">
									{{ __('Заказчик') }}
								</th>
								<th scope="col">
									{{ __('Название') }}
								</th>
								<th scope="col">
									{{ __('Статус') }}
								</th>
								<th scope="col">
									{{ __('Действие') }}
								</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($orders as $order)
								<tr>
									<td>{{ $order->user->getFullNameAttribute() }}</td>
									<td>{{ $order->product->name }}</td>
									<td>{{ $order->status->name }}</td>
									<td>
										<div class="tooltip">
											<a href="{{ route('admin.orders.show_order', $order->id) }}" class="btn btn-auth td-btn_bottom">
												<i class="fa-solid fa-eye"></i>
											</a>
											<span class="tooltiptext">{{ __('Изменить статус') }}</span>
										</div>
									</td>
									<td class="td-btns">
										<form action="{{ route('orders.delete_order', $order->id) }}" method="POST">
											@csrf
											@method('DELETE')
											<button type="submit" onclick="return confirm('{{ __('Вы уверены что хотите удалить категорию?') }}')"
												class="btn btn-auth td-btn_bottom">
												<i class="fa-solid fa-trash"></i>
											</button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
						{{-- count all price --}}
						<tfoot>
							<tr>
								<td colspan="3" class="text-right">
									<strong>{{ __('Общая сумма') }}</strong>
								</td>
								<td>
									<strong>{{ $orders->sum('price') }}
										<i class="fa-solid fa-ruble-sign"></i>
									</strong>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
				{{ $orders->links() }}
			</div>
		</div>
	@endsection
