@extends('layouts.app')

@section('title', 'Админ-панель')

@section('main')
	<div class="main-container">
		<h1>{{ __('Админ-панель') }}</h1>
		{{-- create product --}}

		<div class="admin-container">
			@include('admin.sidebar')
			<div class="admin-content">
				<div class="bottom-container">
					<div class="bottom-container__left">
						<a href="{{ route('dashboard.index_product') }}" class="box">
							{{-- <img class="img-box-blur" src="{{ asset('images/package.png') }}" alt=""> --}}

							<h3 class="section-header">
								{{ __('Добавить товар') }}
							</h3>

							<svg class="img-box" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
								<!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
								<path
									d="M50.7 58.5L0 160H208V32H93.7C75.5 32 58.9 42.3 50.7 58.5zM240 160H448L397.3 58.5C389.1 42.3 372.5 32 354.3 32H240V160zm208 32H0V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192z" />
							</svg>
							<img class="img-bg" src="{{ asset('images/1.jpeg') }}" alt="">
							{{-- <i class="fa-solid fa-plus img-box"></i> --}}
						</a>
					</div>
					<div class="bottom-container__right">
						{{-- show all products --}}
						<a href="{{ route('dashboard.index_all_products') }}" class="box">
							{{-- <img class="img-box-blur" src="{{ asset('images/package.png') }}" alt=""> --}}

							<h3 class="section-header">
								{{ __('Все товары') }}
							</h3>

							{{-- <img class="img-box" src="{{ asset('images/package.png') }}" alt=""> --}}
							<img class="img-bg" src="{{ asset('images/6.jpeg') }}" alt="">
							{{-- <i class="fa-solid fa-plus img-box"></i> --}}
						</a>
					</div>
				</div>
			</div>
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
		});
	</script>
@endpush
