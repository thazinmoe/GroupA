@extends('layouts.app')

@section('content')
<main>
    
    <section class="blogDetail">
        <div class="postDetail">      
            <center><img src="{{ Storage::url($post->image) }}" alt=""/></center>      
            <div class="detailData">
                <div class="data">
                    <span>Travel</span> <small> - {{ $post->created_at->diffForHumans() }}</small>
                    <h3 class="dataTitle">{{ $post->title }}</h3>
                </div>
            </div>
            
            <div class="postBody">
                <p>
                {{ \Illuminate\Support\Str::limit($post->content, 100, '') }}
                @if (strlen($post->content) > 100)
                    <span id="dots">...</span>
                    <span id="more">{{ substr($post->content, 100) }}</span>
                @endif
                </p>

                <button onclick="myFunction()" id="myBtn" class="read-more">Read more</button>
                    
            </div>
                  
        </div>          
         
    </section><!-- Blog Detail-->

    <section class="container-blog">
      <div class="txt-left"><h3 class="text-center mb-4">Posts</h3></div>
      
        <a href="{{ route('posts') }}" class="nav__link {{ request()->is('/') ? ' active-link' : '' }}">
                <i class="bx bx-home-alt nav__icon"></i>
                <span class="nav__name txt-right">View More</span>
        </a>
      
        <div class="row slick_slider justify-content-center">
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
                                    <h5>{{ $post->excerpt }}</h5>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            @endforeach
        </div>
        
    </section> <!--All Blog -->
    </main>
@endsection



