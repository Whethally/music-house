<nav class="sidebar">
	<div>
		<ul class="side-nav">
			<div class="user-nav">
				<span class="side-nav__header">
					{{ __('Меню') }}
					@if (Auth::user()->role_id == 1)
						@if (Route::currentRouteName() != 'profile')
							<a href="{{ url()->previous() }}" class="side-nav__btn">{{ __('Назад') }}</a>
						@endif
					@endif
				</span>
				{{-- profile --}}
				<a href="{{ route('profile') }}" class="side-nav__item side-nav__item-{{ active_link('profile') }}">
					<i class="fa-solid fa-user"></i>
					<span>
						{{ __('Профиль') }}
					</span>
				</a>
				<a href="{{ route('orders') }}" class="side-nav__item side-nav__item-{{ active_link('orders') }}">
					<i class="fa-solid fa-shopping-cart"></i>
					<span>
						{{ __('Заказы') }}
					</span>
				</a>
			</div>

			@if (Auth::user()->role_id == 1)
				<div class="admin-nav">
					<span class="side-nav__header">
						{{ __('Админка') }}
					</span>
					<a href="{{ route('dashboard') }}" class="side-nav__item side-nav__item-{{ active_link('dashboard*') }}">
						<i class="fa-solid fa-box"></i>
						<span>
							{{ __('Товары') }}
						</span>
					</a>
					<a href="{{ route('category.index') }}" class="side-nav__item side-nav__item-{{ active_link('category*') }}">
						<i class="fa-solid fa-boxes"></i>
						<span>
							{{ __('Категории') }}
						</span>
					</a>
					<a href="{{ route('admin.orders') }}" class="side-nav__item side-nav__item-{{ active_link('admin*') }}">
						<i class="fa-solid fa-shopping-cart"></i>
						<span>
							{{ __('Заказы') }}
						</span>
					</a>
				</div>
			@endif
		</ul>
	</div>
</nav>
