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
            <p>Mandalay is the economic centre of Upper Myanmar and considered the centre.</p>
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

  <!--=============== Package ===============-->
  <section class="home-package" id="package">
    <div class="l-inner">
    <div class="project">
      <h3 class="fourth-head">Package</h3>
      
      <div class="project-content">
      @foreach($categories as $category)
          @foreach($category->travel_packages as $travelPackage)
          <div class="project-card">
            <a href="{{ route('detail', $travelPackage) }}">
            <div class="project-card-bg">
              <img src="{{ Storage::url($travelPackage->image) }}"
                      class="img-fluid" alt="">
            </div>
            <div class="project-card-text">
              <a href="#" class="name"> {{ $travelPackage->name }}</a>
            </div>

          </div>
          @endforeach
      @endforeach
      
      </div>
      <div class="txt-view">
      <a  href="{{ route('package') }}"><button>View More</button></a>
      </div>
      </div>
    </div>
  </section>

  <!-- Cars -->
  <section class="home-car">
    <div class="l-inner">
    <h2 class="fourth-head">Car</h2>
    <div class="car-lp">
        @foreach($car as $car)
        <div class="car-sec">
            <img src="{{ Storage::url($car->image) }}" alt="">
            <h4 class="car-name">{{ $car->name }}</h4>
            <p class="car-price">Price-{{ $car->price }} <b>MMK</b></p>
            <p class="dua"><i class='bx bxs-time-five main-color fs-4 me-3'></i> <strong>{{ $car->duration }}</strong></p>
            <a href="#package" class="boo">Go To Package</a>
        </div>
        @endforeach

      </div>
      </div>
  </section>

  <!--=============== Video ===============-->
  <section class="container text-center">
    <h2 class="section-title">Video Tour</h2>
    <div class="row mt-5 justify-content-center">
      <div class="row mt-5">
        <div class="col-12">
          <iframe width="100%" height="514" src="https://www.youtube.com/embed/rToNoxmQURQ" title="A JOURNEY through MYANMAR - CINEMATIC VIDEO" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
  </section>

  <!--=============== Blog ===============-->
  <section class="home-blog">
    <div class="l-inner">
    <h2 class="fourth-head">Our Blog</h2>
      <div class="row slick_slider justify-content-center mt-5">
        @foreach($posts as $post)
        <div class="blogpost">
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
        @endforeach
      </div>
      </div>
        <div class="txt-view">
       <a  href="{{ route('posts') }}"><button>View More</button></a>
      </div>
  </section>
</main>
@endsection

@push('script-alt')
  <script>
      $('.project-content .project-card').hide();
      $('.project-content .project-card:lt(6)').show();
  </script>
@endpush