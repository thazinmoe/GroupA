@extends('layouts.app')

@section('content')
<section class="hero" id="hero" style="
          background: url('{{ asset('frontend/assets/images/img_contactcover.jpg')}}') no-repeat center ; 
          background-size: cover;
          height:55vh;
        ">
  <div class="hero-content h-100 d-flex justify-content-center align-items-center flex-column">
    <h1 class="text-center text-white display-4">Contact Us</h1>
    <p class="text-white">Please Fill Your Message</p>
    <hr width="40" class="text-center" />
  </div>
</section>

<!--<main class="container mb-5 position-relative" style="margin-top: -180px;z-index: 2;">
        <div class="row justify-content-center"> 
            <div class="col-lg-8"> 
                <div class="card p-4">
                  @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{ session('message') }}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                    <form method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Pesan</label>
                            <textarea name="message" class="form-control" rows="5" id="message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-contact">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </main>-->

<!-- contact section starts  -->
<div class="contact" id="contact">
  <div class="row justify-content-center">
    <div class="col-lg-8">
        @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{ session('message') }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
  </div>
  <form method="post">
    <h3>Send Us A Message</h3>
    @csrf
    <div class="inputBox">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" placeholder="Name">
    </div>
    <div class="inputBox">
      <label for="exampleInputEmail1">Your Email</label>
      <input type="email" name="email" id="exampleInputEmail1" placeholder="Email">
    </div>
    <div class="inputBox">
      <label for="message">Message</label>
      <textarea name="message" rows="5" id="message" placeholder="Message"></textarea>
    </div>
    <button type="submit" class="btn">Submit</button>
  </form>
</div>
<!-- contact section ends -->
@endsection