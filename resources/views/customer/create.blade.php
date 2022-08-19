@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card">
        <div class="card-header">
          <h4>Customer Booking Form
            <a href="{{ url('/paket-travel') }}" class="btn btn-danger float-end">BACK</a>
          </h4>
        </div>
        <div class="card-body">
          @if (session('status'))
          <h6 class="alert alert-success">{{ session('status') }}</h6>
          @endif
          <form action="{{ route('add-customer', $travelPackage) }}" method="POST" enctype="multipart/form-data">
            <!--@csrf-->
            {{ csrf_field() }}
            <div class="form-group mb-3">
              <label for="customer_name">Customer Name</label>
              <input type="text" class="form-control  @error('customer_name') is-invalid @enderror" name="customer_name" value="{{ old('customer_name') }}">
              @error('customer_name')
              <p style="color: red; margin-bottom:25px;">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="email">Customer Email</label>
              <input type="text" name="email" value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror">
              @error('email')
              <p style="color: red; margin-bottom:25px;">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="email">Package Name</label>
              <input type="text" name="package_id" value="{{$travelPackage->name}}" class="form-control" disabled>              
            </div>
            <div class="form-group mb-3">
              <label for="email">Package Duration</label>
              <input type="text" name="duration" value="{{$travelPackage->duration}}" class="form-control" disabled>              
            </div>
            <div class="form-group mb-3">
              <label for="email">Package Price</label>
              <input type="text" name="price" value="{{$travelPackage->price}}" class="form-control" disabled>              
            </div>
            <input type="hidden" name="package_id" value="{{$travelPackage->id}}" class="form-control">   
            <div class="form-group mb-3">
              <label for="">Customer ph-number</label>
              <input type="text" name="phno" value="{{ old('phno') }}" class="form-control  @error('phno') is-invalid @enderror">
              @error('phno')
              <p style="color: red; margin-bottom:25px;">{{$message}}</p>
              @enderror
            </div>                   
            <div class="form-group mb-3">
              <button type="submit" class="btn btn-primary">Save Booking</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection