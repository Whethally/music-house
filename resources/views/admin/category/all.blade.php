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
									{{ __('Название') }}
								</th>
								<th scope="col">
									{{ __('Действие') }}
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($categories as $category)
								<tr>
									<td>{{ $category->name }}</td>
									<td class="td-btns">
										<form action="{{ route('category.delete', $category->id) }}" method="POST">
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
					</table>
				</div>
				{{ $categories->links() }}
			</div>
		</div>
	@endsection
