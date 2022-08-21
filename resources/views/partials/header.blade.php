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
              <a href="{{ route('viewHome') }}" class="nav__link {{ request()->is('/') ? ' active-link' : '' }}"">
                <i class="bx bx-home-alt nav__icon"></i>
                <span class="nav__name">Home</span>
              </a>
            </li>


            <li class="nav__item">
              <a href="">
                <i class="bx bx-book-alt nav__icon"></i>
                <span class="nav__name">Blog</span>
              </a>
            </li>

            <li class="nav__item">
              <a href="">
                <i class="bx bx-briefcase-alt nav__icon"></i>
                <span class="nav__name">Package Travel</span>
              </a>
            </li>

            <li class="nav__item">
              <a href="">
                <i class="bx bx-message-square-detail nav__icon"></i>
                <span class="nav__name">Contact Us</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </header>