@extends('layouts.app')

@section('content')
    <main>
      <section class="detail-title">
        <div class="l-inner-package">
          <div class="title">
            <ul class="clearfix">
              <li>
                <a href="{{route('viewHome')}}"><p>Home</p></a>
              </li>
              <li>
                <p>/</p>
              </li>
              <li>
                <p class="color-text">Package Detail</p> 
              </li>
            </ul>        
          </div>
        </div>
      </section>

      <section class="package-title">
        <div class="l-inner">
          <div class="package-title-link">
            <h1 class="package-name">{{ $travelPackage->name }}</h1>
            <h1> {{ $travelPackage->location }} </h1>
          </div>
        </div>
      </section>

      <!--=============== Package Travel ===============-->
      <section class="container detail">
        <div class="swiper mySwiper detail-container">
          <div class="swiper-wrapper">
              
            <div class="detail-card swiper-slide">
              <img  src="{{ Storage::url($travelPackage->image) }}" alt="" class="detail-img"/>
            </div>

          </div>
        </div>
      </section>
      <!--swiper class end-->

      <section class="package-description">
        <div class="l-inner">
          <div class="clearfix">
              <div class="pack-float-left">
                <h2>About Tour Package</h2>
                <p> {{$travelPackage->description}} </p>
              </div>
              <div class="pack-float-right">
                <h2>Start Booking</h2>
                <p>Category : {{ $category_name }}</p>
                <p>Car : {{ $car_name }}</p>
                <p>Duration : {{ $travelPackage->duration }}</p>
                <p>Price : {{ number_format($travelPackage->price) }} MMK</p>
                <h3>Send Payment :</h3>
                <div class="img-float clearfix">
                  <div class="img-float-left">
                    <img height="50" width="100"  src="{{ asset('frontend/assets/images/car_logo.png') }}" alt="Logo">
                  </div>
                  <div class="phone-float-right">
                    <h5>Group-A</h5>
                    <h5>016-486-4656-45</h5>
                  </div>
                </div>
                <a href="{{ route('add-customer', $travelPackage) }}" class="show_confirm">
                  <button>Continue to Book</button>
                </a>
              </div>
          </div>
        </div>
      </section>
    </main>
@endsection

@push('style-alt')
    <link rel="stylesheet" href="{{ asset('frontend/assets/libraries/swipper/css/style.css') }}">
    <style>
        .swiper-container-3d .swiper-slide-shadow-left,
        .swiper-container-3d .swiper-slide-shadow-right {
        background-image: none;
      }
      figure{
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
      }
      figure table {
        --bs-table-bg: transparent;
        --bs-table-accent-bg: transparent;
        --bs-table-striped-color: #212529;
        --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
        --bs-table-active-color: #212529;
        --bs-table-active-bg: rgba(0, 0, 0, 0.1);
        --bs-table-hover-color: #212529;
        --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        vertical-align: top;
        border-color: #dee2e6;
      }

      tbody, td, tfoot, th, thead, tr {
        border-color: inherit;
        border-style: solid;
      }
      table>:not(caption)>*>*{
        border: 1px solid #dee2e6;
      }
      table>:not(caption)>*>* {
        padding: 0.5rem 0.5rem;
        background-color: transparent;
        border-bottom-width: 1px;
        box-shadow: inset 0 0 0 9999px transparent;
      }
    </style>
@endpush

@push('script-alt')
    <script src="{{ asset('frontend/assets/libraries/swipper/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
     <script>
      var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        loop: true,
        spaceBetween: 32,
        coverflowEffect: {
          rotate: 0,
        },
      });
      $('.show_confirm').click(function(event) {
          event.preventDefault();
          var url =  $(this).attr('href');
          swal({
              title: 'Are you sure to continue to book?',
              text : 'This will take you to booking page.',
              icon: "success",
              buttons: true,
              dangerMode: true,
          })
          .then((willBook) => {
            if (willBook) {
              window.location.href = url;
            }
          });
      });
    </script>
@endpush
