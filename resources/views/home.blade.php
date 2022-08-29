@extends('layouts.app')

@section('content')
<main>
  <!--=============== HOME ===============-->
  <section class="hero" id="hero">
    <div class="l-inner">
      <div class="hero-content">
        <h1 class="head"><b>Travel</b> <span>The World With Us</span></h1>
        <a href="#package" class="btn">Book Now</a>
      </div>
    </div>
  </section>
  <!--popular city-->
  <section class="fourth-link">
    <div class="l-inner">
      <h3 class="fourth-head">Popular City</h3>
      <ul class="fourth-list clearfix">
        <li>
          <img src="{{ asset('frontend/assets/images/shwe.jpg') }}" alt="">
          <div class="para">
            <p class="p1">Yangon</p>
            <p>Yangon is Myanmar's most populous city and its most important commercial centre.</p>
          </div>
        </li>
        <li>
          <img src="{{ asset('frontend/assets/images/mandalay.jpg') }}" alt="">
          <div class="para">
            <p class="p1">Mandalay</p>
            <p>Mandalay is the economic centre of Upper Myanmar and considered the centre of Burmese culture.</p>
          </div>
        </li>
        <li>
          <img src="{{ asset('frontend/assets/images/sagaing.jpg') }}" alt="">
          <div class="para">
            <p class="p1">Sagaing</p>
            <p>It is located in the Irrawaddy River, to the south-west of Mandalay on the opposite bank of the river.</p>
          </div>
        </li>
      </ul>
    </div>
  </section>

  <!--=============== Why us ===============-->
  <section class="container why-us text-center">
    <ul class="chef-pic clearfix">
      <li class="chef-info">
        <a href="#">
          <i class="bx bx-money why-us-icon mb-4"></i>
          <h4 class="mb-3">Save Money</h4>
        </a>
      </li>
      <li class="chef-info">
        <a href="#">
          <i class="bx bxs-heart why-us-icon mb-4"></i>
          <h4 class="mb-3">Stay Safe</h4>
        </a>
      </li>
      <li class="chef-info">
        <a href="#">
          <i class="bx bx-timer why-us-icon mb-4"></i>
          <h4 class="mb-3">Save Time</h4>
        </a>
      </li>
    </ul>
  </section>

  <!--=============== Package ===============-->
  <section class="container text-center">
    <h2 class="section-title">Package</h2><br>
    <hr width="80" class="text-center" />
    <div class="row mt-5 justify-content-center">
      <section class="container package text-center" id="package">
        <div class="row">
          @foreach($categories as $category)
          <div class="col-4">
            <div class="mt-5 justify-content-center">

              @foreach($category->travel_packages as $travelPackage)
              <div style="margin-bottom: 140px">
                <div class="card package-card">
                  <a href="{{ route('detail', $travelPackage) }}" class="package-link">
                    <div class="package-wrapper-img overflow-hidden">
                      <img src="{{ Storage::url($travelPackage->image) }}" class="img-fluid" />
                    </div>
                    <div class="package-price d-flex justify-content-center">
                      <span class="btn btn-light position-absolute package-btn">
                        {{ number_format($travelPackage->price) }}
                      </span>
                    </div>
                    <h5 class="btn position-absolute w-100">
                      {{ $travelPackage->name }}
                    </h5>
                  </a>
                </div>
              </div>
              @endforeach

            </div>
          </div>
          <a href="{{ route('package') }}" class="nav__link {{ request()->is('/') ? ' active-link' : '' }}">
                <i class="bx bx-home-alt nav__icon"></i>
                <span class="nav__name">View More</span>
              </a>
          @endforeach
        </div>
      </section>
  </section>
  <!-- Cars -->
  <section class="container text-center">
    <h2 class="section-title">Car</h2>
    <hr width="80" class="text-center" />
    <div class="row mt-5 justify-content-center">
      <div class="row">
        @foreach(\App\Models\Car::get() as $car)
        <div class="col-lg-4 mb-5">
          <div class="card p-3 border-0" style="border-radius: 0;text-align:left;">
            <img style="height: 200px;object-fit: contain;" src="{{ Storage::url($car->image) }}" alt="">
            <h4 class="main-color fw-bold mb-4" style="font-size: 1.4rem">{{ $car->name }}</h4>
            <span class="fw-bold mb-4">Price-{{ $car->price }}</span>
            <span class="d-flex mb-3"><i class='bx bxs-gas-pump main-color fs-4 me-3 '></i> <strong>Driver + BBM</strong> </span>
            <span class="d-flex"><i class='bx bxs-time-five main-color fs-4 me-3'></i> <strong>{{ $car->duration }}</strong></span>
            <a href="#" class="btn mt-4 btn-book">Booking</a>

          </div>
        </div>
        @endforeach

      </div>
  </section>

  <!--=============== Video ===============-->
  <section class="container text-center">
    <h2 class="section-title">Video Tour</h2>
    <hr width="80" class="text-center" />
    <div class="row mt-5 justify-content-center">
      <div class="row mt-5">
        <div class="col-12">
          <iframe width="100%" height="514" src="https://www.youtube.com/embed/rToNoxmQURQ" title="A JOURNEY through MYANMAR - CINEMATIC VIDEO" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
  </section>

  <!--=============== Blog ===============-->
  <section class="container blog text-center">
    <h2 class="section-title">Our Blog</h2>
    <hr width="80" class="text-center" />
    <div class="row mt-5 justify-content-center">
      <div class="row slick_slider justify-content-center mt-5">
        @foreach($posts as $post)
        <div class="col-lg-4 mb-4 blogpost">
          <a href="{{ route('posts.show', $post)  }}">
            <div class="card-post">
              <div class="card-post-img">
                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}">
              </div>
              <div class="card-post-data">
                <span>Travel</span> <small>- {{ $post->created_at->diffForHumans() }}</small>
                <h5>{{ $post->title }}</h5>
              </div>
            </div>
          </a>
          
        </div>
        <a href="{{ route('posts') }}" class="nav__link {{ request()->is('/') ? ' active-link' : '' }}">
                <i class="bx bx-home-alt nav__icon"></i>
                <span class="nav__name">View More</span>
              </a>
        @endforeach
      </div>
  </section>
</main>
@endsection