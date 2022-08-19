@extends('admin.layout')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Package Travel</h1>
        <a href="{{ route('admin.travel-packages.create') }}" class="btn btn-primary btn-sm shadow-sm">Create Travel Package  <i class="fa fa-plus"> </i></a>
    </div>

        <div class="card-body">

            @if(session('message'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>{{ session('message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row mb-3 float-right">
                <form action="{{ route('admin.package-search') }}" method="post">
                @csrf
                    <div class="input-group">
                        <input type="text" class="form-control rounded" placeholder="Search..." name="search" id="search" />
                        <button type="submit" class="btn btn-success"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Package Name</th>
                            <th>Location</th>
                            <th>Duration</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($travelPackages as $travelPackage)
                        <tr>
                            <td>{{ $travelPackage->id }}</td>
                            <td>{{ $travelPackage->name }}</td>
                            <td>{{ $travelPackage->location }}</td>
                            <td>{{ $travelPackage->duration }}</td>
                            <td>
                                <img width="150" src="{{ Storage::url($travelPackage->image) }}" alt="">
                            </td>
                            <td>{{ $travelPackage->price }}</td>
                            <td>
                                <a href="{{ route('admin.travel-packages.edit', $travelPackage) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form  class="d-inline" action="{{ route('admin.travel-packages.destroy', $travelPackage) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onClick="return confirm('Are you sure want to delete?')" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Data Empty</td>
                        </tr>
                        @endforelse         
                    </tbody>
                </table>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection