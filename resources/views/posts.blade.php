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
        <div class="row slick_slider justify-content-center mt-5 mb-10">
            
         
        @foreach($posts as $post)
          <div class="blogpost">
            <ul>
                <li>
                    <a href="{{ route('posts.show', $post)  }}">
                        <div class="card-post">
                            <div class="blogImg">
                                <!--<img src="{{ Storage::url($post->image) }}"
                                    alt="{{ $post->title }}">-->
                                    <img src="{{ asset('frontend/assets/images/balloon.jpg') }}" alt="">
                            </div>
                            <div class="post-data">
                                <span>Travel</span> <small>- {{ $post->created_at->diffForHumans() }}</small>
                                <h5>{{ $post->title }}</h5>
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
      <h2 class="img-title">Image Gallery</h2><br>
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

    </main>
@endsection