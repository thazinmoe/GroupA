@extends('admin.layout')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Package Travel - {{ $travelPackage->name }}</h1>
        <a href="{{ route('admin.travel-packages.index') }}" class="btn btn-primary btn-sm shadow-sm"><i class="fa fa-arrow-left mr-2"></i>Back</a>
    </div>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Content Row -->
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('admin.travel-packages.update', $travelPackage ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="category_id">Category Travel</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="">Select to Edit Cateogry</option>
                        @foreach($categories as $category)
                        @if (old('category_id',$travelPackage->category_id) == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
                        @else
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="car_id">Choose Car</label>
                    <select name="car_id" id="car_id" class="form-control">
                        <option value="">Select to Edit Cars</option>
                        @foreach($cars as $car)
                        @if (old('car_id',$travelPackage->car_id) == $car->id)
                        <option value="{{ $car->id }}" selected>{{ $car->name }} - {{number_format($car->price)}} MMK</option>
                        @else
                        <option value="{{ $car->id }}">{{ $car->name }} - {{number_format($car->price)}} MMK</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$travelPackage->name) }}" />
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ old('location',$travelPackage->location) }}" }}" />
                </div>
                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration',$travelPackage->duration) }}" }}" />
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description',$travelPackage->description) }}</textarea>
                </div>
                <!--  -->
                <div class="form-group">
                    <label for="image">Image</label><br>
                    <img src="{{Storage::url($travelPackage->image)}}" alt="Image" width=150><br><br>
                    <input type="file" class="form-control" id="image" name="image" value="{{ old('image',$travelPackage->image) }}" />
                </div>
                <!--  -->
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price',$travelPackage->price - $car_price) }}" />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    <!-- Content Row -->
</div>
@endsection