@extends('layouts.app')

@section('title', 'Категории')

@section('main')
	<div class="main-container">
		<h1>{{ __('Категории') }}</h1>
		<div class="admin-container">
			@include('admin.sidebar')
			<div class="admin-content">
				<div class="bottom-container">
					<div class="bottom-container__left">
						<a href="{{ route('category.add') }}" class="box">
							{{-- <img class="img-box-blur" src="{{ asset('images/package.png') }}" alt=""> --}}

							<h3 class="section-header">
								{{ __('Добавить категорию') }}
							</h3>
							<svg class="img-box" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
								<!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
								<path
									d="M248 0H208c-26.5 0-48 21.5-48 48V160c0 35.3 28.7 64 64 64H352c35.3 0 64-28.7 64-64V48c0-26.5-21.5-48-48-48H328V80c0 8.8-7.2 16-16 16H264c-8.8 0-16-7.2-16-16V0zM64 256c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H224c35.3 0 64-28.7 64-64V320c0-35.3-28.7-64-64-64H184v80c0 8.8-7.2 16-16 16H120c-8.8 0-16-7.2-16-16V256H64zM352 512H512c35.3 0 64-28.7 64-64V320c0-35.3-28.7-64-64-64H472v80c0 8.8-7.2 16-16 16H408c-8.8 0-16-7.2-16-16V256H352c-15 0-28.8 5.1-39.7 13.8c4.9 10.4 7.7 22 7.7 34.2V464c0 12.2-2.8 23.8-7.7 34.2C323.2 506.9 337 512 352 512z" />
							</svg>
							<img class="img-bg" src="{{ asset('images/7.jpeg') }}" alt="">
						</a>
					</div>
					<div class="bottom-container__right">
						<a href="{{ route('category.all') }}" class="box">
							{{-- <img class="img-box-blur" src="{{ asset('images/package.png') }}" alt=""> --}}

							<h3 class="section-header">
								{{ __('Все категории') }}
							</h3>
							<img class="img-bg" src="{{ asset('images/13.jpeg') }}" alt="">
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
