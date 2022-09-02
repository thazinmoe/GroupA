@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card my-4">
        <div class="card-header">
          <h4>Customer Booking Form
            <a href="{{ url('/package-travel') }}" class="btn mb-3 float-end">BACK</a>
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
              <label for="customer_name" class="form-label">Customer Name</label>
              <input type="text" class="form-control  @error('customer_name') is-invalid @enderror" name="customer_name" value="{{ old('customer_name') }}">
              @error('customer_name')
              <p style="color: red; margin-bottom:25px;">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="email" class="form-label">Customer Email</label>
              <input type="text" name="email" value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror">
              @error('email')
              <p style="color: red; margin-bottom:25px;">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="packagename" class="form-label">Package Name</label>
              <input type="text" name="package_id" value="{{$travelPackage->name}}" class="form-control" disabled>              
            </div>
            <div class="form-group mb-3">
              <label for="packageduration" class="form-label">Package Duration</label>
              <input type="text" name="duration" value="{{$travelPackage->duration}}" class="form-control" disabled>              
            </div>
            <div class="form-group mb-3">
              <label for="packageprice" class="form-label">Package Price</label>
              <input type="text" name="price" value="{{$travelPackage->price}}" class="form-control" disabled>              
              <input type="text" name="package_price" value="{{$travelPackage->price}}" class="form-control" hidden>             
            </div>
            <div class="form-group mb-3">
              <label for="packagecount" class="form-label">Package Count</label>                         
              <input type="number" name="package_count"  class="form-control  @error('package_count') is-invalid @enderror">
              @error('package_count')
              <p style="color: red; margin-bottom:25px;">{{$message}}</p>
              @enderror              
            </div>
            <input type="hidden" name="package_id" value="{{$travelPackage->id}}" class="form-control">   
            <div class="form-group mb-3">
              <label for="customerph" class="form-label">Customer ph-number</label>
              <input type="number" name="phno" value="{{ old('phno') }}" class="form-control  @error('phno') is-invalid @enderror">
              @error('phno')
              <p style="color: red; margin-bottom:25px;">{{$message}}</p>
              @enderror
            </div>                   
            <div class="form-group mb-3">
              <button type="submit" class="btn">Save Booking</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection