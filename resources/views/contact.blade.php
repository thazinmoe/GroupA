@extends('layouts.app')

@section('content')
<section class="hero" id="hero">
  <div class="hero-content h-100 d-flex justify-content-center align-items-center flex-column">
    <h1 class="text-center text-white display-4">Contact Us</h1>
    <p class="text-white">Please Fill Your Message</p>
    <hr width="40" class="text-center" />
  </div>
</section>
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
      <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}" />
      @error('name')
      <p style="color: red;">{{$message}}</p>
      @enderror
    </div>
    <div class="inputBox">
      <label for="exampleInputEmail1">Your Email</label>
      <input type="text" name="email" id="exampleInputEmail1" placeholder="Email" value="{{ old('email') }}" />
      @error('email')
      <p style="color: red;">{{$message}}</p>
      @enderror
    </div>
    <div class="inputBox">
      <label for="message">Message</label>
      <textarea name="message" rows="5" id="message" placeholder="Message">{{ old('message') }}</textarea>
      @error('message')
      <p style="color: red;">{{$message}}</p>
      @enderror
    </div>
    <button type="submit" class="btn">Submit</button>
  </form>
</div>
<!-- contact section ends -->
@endsection