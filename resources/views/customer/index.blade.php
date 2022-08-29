@extends('admin.layout')

@section('content')
<style>
  .line{
    text-decoration:line-through;
  }
</style>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Customer Information</h1>           
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
            <a class="btn btn-success mt-4" href="/admin/exportexcel"> Export EXCEL</a> 

                <!--search -->
            <form action="" method="GET">
            @csrf
            <br>           
              <div class="row">
                <div class="container-fluid">
                  <div class="form-group row">
                    <label for="customer_name" class="col-form-label col-sm-1">Customer Name</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control input-sm" id="customer_name" name="customer_name">
                    </div>                    
                    <label for="date" class="col-form-label col-sm-1">From</label>
                    <div class="col-sm-2">
                      <input type="date" class="form-control input-sm" id="from" name="fromDate">
                    </div>
                    <label for="date" class="col-form-label col-sm-1">To</label>
                    <div class="col-sm-2">
                      <input type="date" class="form-control input-sm" id="to" name="toDate">
                    </div>
                    <div class="col-sm-2">
                      <button type="submit" class="btn btn-outline-success" name="search" title="Search">Search</button>
                    </div>
                  </div>
                </div>          
            </div>
          </form>
          <!--search -->
            <div class="table-responsive">
                <table class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>Customer Name</th>
                          <th>Customer Email</th>
                          <th>Ph number</th>
                          <th>Package Name</th> 
                          <th>Package Price</th>
                          <th>Package Count</th>                   
                          <th>Action</th>                          
                        </tr>
                    </thead>
                    <tbody>                   
                      @forelse($customers as $key => $customer)
                          @if($customer->completed)
                          <tr>
                              <td >{{ ++$key }}</td>
                              <td class="line">{{ $customer->customer_name }}</td>
                              <td class="line">{{ $customer->email }}</td>
                              <td class="line">{{ $customer->phno }}</td>
                              <td class="line">{{ $customer->package_name }}</td>
                              <td class="line">{{ $customer->package_price }}</td>
                              <td class="line">{{ $customer->package_count }}</td>
                              <td>
                                  <a href="{{asset('admin/' . $customer->id . '/completed')}}" class="btn btn-info">
                                      <i class="fa fa-pencil-alt"></i>
                                  </a>                            
                                    <a href="{{ url('admin/delete-customer/'.$customer->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to Remove?');">
                                        <i class="fa fa-trash"></i>
                                    </a>  
                              </td>
                          </tr>
                          @else 
                            <tr>
                               <td >{{ ++$key }}</td>
                              <td>{{ $customer->customer_name }}</td>
                              <td>{{ $customer->email }}</td>
                              <td>{{ $customer->phno }}</td>
                              <td>{{ $customer->package_name }}</td>
                              <td>{{ $customer->package_price }}</td>
                              <td>{{ $customer->package_count }}</td>
                              <td>
                                  <a href="{{asset('admin/' . $customer->id . '/completed')}}" class="btn btn-info">
                                      <i class="fa fa-pencil-alt"></i>
                                  </a>  
                                  <a href="{{ url('admin/delete-customer/'.$customer->id) }}" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                  </a>  
                              </td>
                            </tr>
                          @endif
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