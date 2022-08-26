@extends('layouts.app')

@section('content')
      <!--=============== HOME ===============-->
      <section class="main-visual">
        <div class="l-inner">
          <div class="mv-part">
            <h1 class="mv-head">Package Travel</h1>
          </div>          
        </div>
      </section>

      <!--=============== Package Travel ===============-->

      
    <section class="intro-sec-row">
      <div class="intro-package">
        <div class="l-inner">
          <div class="clearfix">
            <div class="intro-left">
              <img src="{{ asset('frontend/assets/images/second-mv.jpg') }}" alt="Intro Image">
            </div>

            <div class="intro-right">
              <h3 class="cmn-head">Vist and Discover amazing places in Myanmar</h3>            
              <div class="tabs-nav">
                <ul>
                  <li class="active"><a href="#tab1">Amazing Tour</a></li>
                  <li><a href="#tab2">Our Mission</a></li>
                  <li><a href="#tab3">Variety Tour</a></li>
                </ul>
              </div>
              <section class="tabs-content">
                <div class="tabs-texts" id="tab1">
                <p>Wonder Tour is committed to bringing our clients the best in value and quality travel arrangements. We are passionate about travel and sharing the world's wonders with you.</p>          
                </div>
                <div class="tabs-texts" id="tab2">
                  <p>Our mission is to provide the ultimate travel planning experience while becoming a one-stop shop for every travel service available in the industry.</p>
                </div>
                <div class="tabs-texts" id="tab3">
                  <p>We offer a wide variety of personally picked tours with destinations all over the globe.Our tour managers are qualified, skilled, and friendly to bring you the best service.</p>
                </div>
              </section>
              </div>
          </div>
        </div>
      </div>
    </section>

    <section class="third-row">
      <div class="l-inner">
        <div class="category-part">
          <h1 class="cmn-head">Available Packages</h1>
          <div class="clearfix">
            <div class="float-left">
              <div class="category-list">
                <h3>Categories List</h3>
                <ul>
                  @foreach($categories as $cat)
                  <li id="cat{{$cat->id}}">
                    <a href="{{ route('package_by_cat',$cat->id)}}">{{$cat->title}}</a>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>

            <div class="float-right" id="tag_container"> 
              @include('package_paginate')              
            </div>

          </div>
        </div>
      </div>      
    </section>

    <section class="fourth-row">
      <div class="l-inner">
        <div class="center-class">
          <h1 class="cmn-head">Popular Packages</h1>
          <span class="small-head">Everything in this packages are awesome.</span>
        </div>
        @foreach($popu_packages as $pack)
          <div class="fourth-card clearfix">
            <div class="inner-float">
              <div class="float-img">
                <img src="{{ Storage::url($pack->image) }}" alt="">
              </div>

              <div class="float-texts">
                <h1 class="float-text-head">{{$pack->name}}</h1>
                <p class="desc">{{ Str::limit($pack->description)}}</p>
                <hr>
                <p class="price">Price : {{number_format($pack->price)}} MMK</p>
              </div>

              <div class="float-buttons">
                <p class="location">Location : {{$pack->location}}</p>
                <p class="duration">Duration : {{$pack->duration}}</p>
                <a href=" {{ route('detail',$pack->slug) }} ">
                  <button>Book Now</button>
                </a>
              </div>

            </div>        
            
          </div>  
        @endforeach 
      </div>
    </section>


@endsection

@push('script-alt')
<script>
        $(window).on('hashchange',function(){
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                } else{
                    getData(page);
                }
            }
        });
        $(document).ready(function(){
            $(document).on('click','.pagination a',function(event){
                event.preventDefault();
                $('li').removeClass('active');
                $(this).parent('li').addClass('active');
                var url = $(this).attr('href');
                var page = $(this).attr('href').split('page=')[1];
                getData(page);
            });
        });
        function getData(page) {
            // body...
            $.ajax({
                url : '?page=' + page,
                type : 'get',
                datatype : 'html',
            }).done(function(data){
                $('#tag_container').empty().html(data);
                location.hash = page;
            }).fail(function(jqXHR,ajaxOptions,thrownError){
                alert('No response from server');
            });
        }
    </script>
@endpush