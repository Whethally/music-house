@extends('layouts.app')

@section('title', 'Изменить статус заказа')

@section('main')
	<div class="main-container">
		<h1>{{ __('Изменить статус') }}</h1>
		{{-- form with add image --}}

		<div class="admin-container">
			@include('admin.sidebar')
			<div class="admin-content">
				<div class="bottom-container">
					<form method="POST" action="{{ route('admin.orders.update_order', $order->id) }}" class="form"
						enctype="multipart/form-data">
						@csrf
						@method('put')
						<div class="form-container">
							{{-- statuses of order from db --}}
							<div class="form-group">
								<select name="status_id" id="status_id" class="form-control">
									@foreach ($statuses as $status)
										<option value="{{ $status->id }}" @if ($status->id == $order->status_id) selected @endif>
											{{ $status->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group mb-0">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-auth">
										{{ __('Изменить статус') }}
									</button>
								</div>
							</div>
						</div>
					</form>
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
