@extends('layouts.app')

@section('content')
<main>
      <!--=============== HOME ===============-->
      <section class="Travelblog" id="hero">
        <div class="blog-content">
        <h2 class="title_heading">
      <span class="title-word title-word-1">This</span>
      <span class="title-word title-word-2">is</span>
      <span class="title-word title-word-3">Travel</span>
      <span class="title-word title-word-4">Blog</span>
      </h2>
        </div>
      </section>

      <!--=============== Blog ===============-->
      <section class="container-blog">
        <div class="row justify-content-center mt-5 mb-10">
            
         
        @foreach($posts as $post)
          <div class="blogpost">
            <ul>
                <li>
                    <a href="{{ route('posts.show', $post)  }}">
                        <div class="card-post">
                            <div class="blogImg">
                                <img src="{{ Storage::url($post->image) }}"
                                    alt="{{ $post->title }}">
                                    <!--<img src="{{ asset('frontend/assets/images/balloon.jpg') }}" alt="">-->
                            </div>
                            <div class="post-data">
                                <span>Travel</span> <small>- {{ $post->created_at->diffForHumans() }}</small>
                                <h5>{{ $post->title }}</h5>
                                <!--<p>
                                  {{ \Illuminate\Support\Str::limit($post->content, 50, '') }}
                                  @if (strlen($post->content) > 50)
                                      <span id="dots">...</span>
                                      <span id="more">{{ substr($post->content, 50) }}</span>
                                  @endif
                                </p>-->

            <!--<button onclick="myFunction()" id="myBtn" class="read-more">Read more</button>-->
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
          </div>
        @endforeach
        </div>
      </section>
        <!--=============== Blog Image ===============-->
      <section class="container-blog">
        <h2 class="img-title">Gallery</h2><br>
        <div class="row slick_slider justify-content-center mt-20">
        @foreach($posts as $post)
          <div class="blogpost slider">
            <ul>
                <li>
                    <div class="card-post-Img">
                        <div class="blogImg">
                            <img src="{{ Storage::url($post->image) }}"
                                    alt="{{ $post->title }}">
                        </div>
                    </div>
                    
                </li>
            </ul>
          </div>
        @endforeach
        </div>
        
      </section>
      <section class="intro-sec-row ">
        <div class="intro-package">
          <div class="l-inner">
            <div class="clearfix">
              <div class="intro-left">
                <div class="row slick_slider1 justify-content-center mt-20">
                  @foreach($posts as $post)
                    <div class="blogpost slider">
                      <ul>
                          <li>
                            <div class="card-post-Img">
                              <div class="blogImg1">
                                  <img src="{{ Storage::url($post->image) }}"
                                              alt="{{ $post->title }}">
                              </div>
                            </div>
                          </li>
                      </ul>
                    </div>
                  @endforeach
                </div>
              </div>

              <div class="intro-right">
                <h3 class="cmn-head">Popular Festivals in Myanmar</h3>            
                
                  <!-- Accordion -->
                <div class="acc-container">        
                  <div class="acc">
                    <div class="acc-head">
                      <p>Thingyan Festival</p>
                    </div>
                    <div class="acc-content">
                      <p>The most famous festival in Myanmar, the Thingyan Water Festival is held in celebration of the Myanmar New Year. This festival is similar to the famous Songkran Festival in Thailand wherein people throw or splash water at one another during the four-day festival. The festival happens all across the Yangon region, but Mandalay has the bragging rights for being the most crowded city to celebrate the Myanmar New Year.</p>
                    </div>
                  </div>

                  <div class="acc">
                    <div class="acc-head">
                      <p>Kachin Manaw Festival</p>
                    </div>
                    <div class="acc-content">
                      <p>Manaw Festival is usually held in Kachin State and is held every year in January to welcome the New Year. During the festival, you will see Manaw poles that are long, artistically designed, and erected at the centre of the festival area. Kachin people usually dance around these poles as a way to celebrate the New Year, the reunion of tribes, and the victories in battle. You can see beautiful Kachin people in their traditional costumes, and you may also participate in the dance with them during the festival.</p>
                    </div>
                  </div>

                  <div class="acc">
                    <div class="acc-head">
                      <p>Taunggyi Tazaungdaing Festival</p>
                    </div>
                    <div class="acc-content">
                      <p>The most popular festival held in the Shan State is the Taunggyi Tazaungdaing, also known as the Festival of Lights, which usually happens around November. During the festival, you can see many hot air balloons of varying shapes and sizes that are launched to the sky as an offering to the heavens, and to fight off evil spirits. </p>
                    </div>
                  </div>

                  <div class="acc">
                    <div class="acc-head">
                      <p>Kyaikhtiyo Thadingyut Festival</p>
                    </div>
                    <div class="acc-content">
                      <p>Although Thadingyut Festival is held all across Myanmar, the Kyaikhtiyo Thadingyut Festival is the most famous of all among the locals. People light candles during the festival as a way to welcome the Lord Buddha back from the heavens, where he is believed to preach to his reborn mother, before returning to earth. On the day of the full moon of Thadingyut, locals offer 9,000 candles and flowers to the pagoda.</p>
                    </div>
                  </div>
                </div>
                               
              </div>
            </div>
          </div>
        </div>
    </section>

    </main>
@endsection