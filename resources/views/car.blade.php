@extends('layouts.app')

@section('content')
<main>
      
    <section class="carview" id="hero">
        <div class="blog-content">
            <h2 class="title-head">Have A Safe Trip</h2>
        </div>
    </section><!--Travelblog-->

      
   <section class="home-car">
    <div class="l-inner">
      <h2 class="fourth-head">Choose Car</h2>
      <div class="car-lp">
        @foreach($cars as $car)
        <div class="car-sec">
          <img src="{{ Storage::url($car->image) }}" alt="">
          <h4 class="car-name">{{ $car->name }}</h4>
          <p class="car-price">Price-{{ $car->price }} <b>MMK</b></p>
          <p class="dua"><i class='bx bxs-time-five main-color fs-4 me-3'></i> <strong>{{ $car->duration }}</strong></p>
          <a href="{{ route('viewHome') }}" class="boo">Book now</a>
        </div>
        @endforeach
      </div>
    </div>
  </section><!--container-blog-->

</main>
@endsection