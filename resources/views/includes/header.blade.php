{{-- nav header with classes --}}
<div class="footer">

	<div class="navbar-logo">
		<li class="nav-item">
			<img src="{{ asset('icon.png') }}" alt="icon" width="32">
			<a class="navbar-brand" href="{{ route('home') }}">{{ __('Music House') }}</a>
		</li>
	</div>
	<nav class="navbar">
		<div class="navbar-block">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link {{ active_link('home') }}" href="{{ route('home') }}">{{ __('Главная') }}</a>
				</li>

				{{-- only when open about page show text name from product on header --}}
				@if (Route::currentRouteName() == 'home.show')
					<li class="nav-item">
						<span class="nav-link active" href="{{ route('home') }}">
							{{ $product->name }}
						</span>
					</li>
				@endif

				{{-- @foreach ($subnav as $category)
					<li class="nav-item">
						<a class="nav-link {{ active_link('home') }}" href="{{ route('home.category', $category->id) }}">
							{{ $category->name }}
						</a>
					</li>
				@endforeach --}}
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link {{ active_link('cart') }}" href="{{ route('cart') }}">
						<i class="fa-solid fa-shopping-cart"></i>
						<span class="badge badge-pill badge-danger">{{ Cart::name('shopping')->countItems() }}</span>
					</a>
				</li>
				@guest
					<li class="nav-item">
						<a class="nav-link btn btn-auth" href="{{ route('login') }}">{{ __('Войти') }}</a>
					</li>
					{{-- @if (Route::has('register')) --}}
					<li class="nav-item">
						<a class="nav-link {{ active_link('register') }}" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
					</li>
					{{-- @endif --}}
				@else
					<li class="nav-item">
						<a class="nav-link {{ active_link('profile') }}" href="{{ route('profile') }}">
							{{ Auth::user()->getShortNameAttribute() }}
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link btn btn-auth" href=""
							onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
							{{ __('Выйти') }}
						</a>
						<form id="logout-form" action="logout" method="POST" style="display: none;">
							@csrf
						</form>
					</li>
				@endguest
				{{-- @if (Auth::user() && Auth::user()->role_id == 1)
					<li class="nav-item">
						<a class="nav-link {{ active_link('dashboard') }}" href="{{ route('dashboard') }}">
							{{ __('Админ') }}
						</a>
					</li>
				@endif --}}
				{{-- <li class="nav-item">
					<i class="fas fa-sun"></i>
					<div class="dark-mode-switch">
						<label class="switch">
							<input id="dark-mode" type="checkbox" onclick="toggleDarkMode()">
							<span class="slider"></span>
						</label>
					</div>
					<i class="fas fa-moon"></i>
				</li> --}}
				<form action="{{ route('theme.change') }}" method="POST">
					@csrf
					<li class="nav-item">

						<i class="fas fa-sun"></i>

						<div class="dark-mode-switch">
							<label class="switch">
								<input id="dark-mode" type="checkbox" name="theme" value="dark"
									{{ session('theme') == 'dark' ? 'checked' : '' }} onclick="this.form.submit()">
								<span class="slider"></span>
							</label>
						</div>
						<i class="fas fa-moon"></i>
					</li>

				</form>
			</ul>
		</div>
	</nav>

</div>
