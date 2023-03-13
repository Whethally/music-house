@if (session('flash.message'))
	<div class="alert alert-{{ session('flash.type', 'success') }} mb-0 rounded-0 text-center small py-2">
		{{ session('flash.message') }}
		{{-- <button type="button" class="btn-close float-end" data-bs-dismiss="alert">
			<i class="fas fa-times"></i>
		</button> --}}
	</div>
@endif
