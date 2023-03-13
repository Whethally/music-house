@extends('layouts.app')

@section('title', 'Все товары')

@section('main')
	<div class="main-container">
		<h1>{{ __('Все товары') }}</h1>

		<div class="admin-container">
			@include('admin.sidebar')
			<div class="admin-content">
				<div class="bottom-container">
					{{-- table all product --}}
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">
									{{ __('Картинка') }}
								</th>
								<th scope="col">
									{{ __('Имя') }}
								</th>
								<th scope="col">
									{{ __('Всего') }}
								</th>
								<th scope="col">
									{{ __('Действие') }}
								</th>
								<th scope="col">

								</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($products as $product)
								<tr>
									<td>
										<img src="{{ asset('images/' . $product->image) }}" alt="" width="100">
									</td>
									<td>{{ $product->description }}</td>
									{{-- <td>
										{{ number_format($product->price, 0, ',', ' ') }}
										<span class="rub">&#8381;</span>
									</td> --}}
									<td>{{ $product->quantity }}</td>
									<td>
										<div class="tooltip">
											<a href="{{ route('dashboard.edit_product', $product->id) }}" type="submit"
												class="btn btn-auth td-btn_bottom">
												<i class="fa-solid fa-edit"></i>
											</a>
											<span class="tooltiptext">{{ __('Изменить') }}</span>
										</div>

									</td>
									<td class="td-btns">
										<div class="tooltip">
											<form action="{{ route('dashboard.delete_product', $product->id) }}" method="POST">
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
						</tbody>
					</table>
				</div>
				{{ $products->links() }}
			</div>
		</div>
	@endsection
