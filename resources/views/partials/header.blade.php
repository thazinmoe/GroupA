<header class="header" id="header">
      <nav class="nav container">
        <a href="{{ route('home') }}" class="nav__logo"
          ><img
            width="250"
            style="height: 70px"
            src="{{ asset('frontend/assets/images/testing.png') }}"
            alt=""
        /></a>

        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="{{ route('viewHome') }}" class="nav__link {{ request()->is('/') ? ' active-link' : '' }}">
                <i class="bx bx-home-alt nav__icon"></i>
                <span class="nav__name">Home</span>
              </a>
            </li>


            <li class="nav__item">
              <a href="{{ route('posts') }}" class="nav__link {{ request()->is('posts') ? ' active-link' : '' }}">
                <i class="bx bx-book-alt nav__icon"></i>
                <span class="nav__name">Blog</span>
              </a>
            </li>

            <li class="nav__item">
              <a href="{{ route('package') }}" class="nav__link {{ request()->is('package-travel') ? ' active-link' : '' }}">
                <i class="bx bx-briefcase-alt nav__icon"></i>
                <span class="nav__name">Package Travel</span>
              </a>
            </li>

            <li class="nav__item">
              <a href="{{ route('contact') }}" class="nav__link {{ request()->is('contact') ? ' active-link' : '' }}">
                <i class="bx bx-message-square-detail nav__icon"></i>
                <span class="nav__name">Contact Us</span>
              </a>
            </li>

            @guest
            <li class="nav__item"><a class="nav__link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            <li class="nav__item"><a class="nav__link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
            @else
            <li class="nav-item dropdown pure-menu-item ">
              <a id="name" class="nav__link">
                {{ Auth::user()->name}}
              </a>
            </li>
            <li>
              <a class="nav__link" style="color: #000000;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
            @endguest
          </ul>
        </div>
      </nav>
    </header>