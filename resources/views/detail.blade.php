@extends('layouts.app')

@section('content')
    <main>
      <section class="container mt-5" style="margin-bottom: 70px">
        <div class="col-12 col-md">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="title-alt" href="{{ route('home') }}">Home</a>
              </li>
              <li class="breadcrumb-item main-color">Package Detail</li>
            </ol>
          </nav>
        </div>

        <div class="col-12 col-md text-center">
          <h1 class="main-color">{{ $travelPackage->name }}</h1>
          <span class="title-alt">{{ $travelPackage->location }}</span>
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

        <div class="row" style="margin-top: 120px">
          <div class="col-12 col-md-12 col-lg-7 mb-5">
            <div class="card border-0 p-2">
              <h3 class="fw-bolder title mb-4">About Tour Packages</h3>
              {!! $travelPackage->description !!}
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-5">
            <div class="card bordered card-form" style="padding: 30px 40px">
              <h4 class="text-center mb-3">Start Booking</h4>              
              <div
                class="alert alert-secondary"
                style="background-color: #f5f5f5; border: 1px solid #f5f5f5"
                role="alert"
              >
                Category :
                <span class="text-gray-500 font-weight-light"
                  >{{ $category_name }}</span
                >
              </div>
              <div
                class="alert alert-secondary"
                style="background-color: #f5f5f5; border: 1px solid #f5f5f5"
                role="alert"
              >
                Car :
                <span class="text-gray-500 font-weight-light"
                  >{{ $car_name }}</span
                >
              </div>
              <div
                class="alert alert-secondary"
                style="background-color: #f5f5f5; border: 1px solid #f5f5f5"
                role="alert"
              >
                Duration: {{ $travelPackage->duration }}
              </div>
              <div
                class="alert alert-secondary"
                style="background-color: #f5f5f5; border: 1px solid #f5f5f5"
                role="alert"
              >
                Price :
                <span class="text-gray-500 font-weight-light"
                  >{{ number_format($travelPackage->price) }} MMK</span
                >
              </div>
              <h5 class="">Send Payment</h5>
             <div class="card-bank d-flex align-items-center justify-content-around">
                <img height="40" width="80" src="{{ asset('frontend/assets/images/testing.png') }}" alt="">
                <div class="card-bank-content d-flex flex-column">
                  <span>Group-A</span>
                  <b>09-00022233</b>
                </div>
             </div>
              <a onClick="return confirm('Are you sure booking ?')" class="btn btn-book btn-block mt-3" href="{{ route('add-customer', $travelPackage) }}"
                >Continue to Book</a
              >
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
    </script>
@endpush
