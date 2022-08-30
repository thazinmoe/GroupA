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

    <section class="container">
      <div class="txt-left"><h3 class="text-center mb-4">Posts</h3></div>
      
        <a href="{{ route('posts') }}" class="txt-right nav__link  {{ request()->is('posts') ? ' active-link' : '' }}">
                <i class="bx bx-book-alt nav__icon"></i>
                <span class="nav__name txt-right">All Posts</span>
        </a>
      
        <div class="row slick_slider justify-content-center">

            @foreach(\App\Models\Post::get() as $post)
            <div class="col-lg-4 mb-4">
              <a href="{{ route('posts.show', $post) }}">
                <div class="card text-center p-4">
                  <h4 class="title mb-2">{{ $post->title }}</h4>
                  <span class="main-color">Posting <span href="#">{{ $post->created_at->diffForHumans() }}</span></span>
                  <div class="card-body p-3">
                    <img src="{{ Storage::url($post->image) }}" alt=""/>             
                    <p class="title-alt mt-5">
                      {{ $post->excerpt }}
                    </p>
                  </div>
                </div>
              </a>
              
            </div>
            @endforeach

        </div>
    </section> <!--All Blog -->
    </main>
@endsection



