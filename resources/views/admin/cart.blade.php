@extends('layouts.admin')

@section('admincontent')

  <h1 class="h3 mb-2 text-gray-800">Cart (Make Order)</h1>

    <div class="row">
      
      <div class="col-md-6">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cart Tables</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Qantitiy</th>
                    <th>Total</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @php $total = 0; @endphp
                  @foreach($carts as $cat)
                  <tr>
                    <td>{{$cat->product->name}}</td>
                    <td>{{$cat->product->price}}</td>
                    <td>{{$cat->quantity}}</td>
                    <td>{{$cat->product->price * $cat->quantity }}</td>
                    <td><a href="/cart/delete/{{$cat->id}}" class="bnt btn-danger btn-circle"><i class="fas fa-trash"></i></a></td>
                  </tr>
                  @php
                  $total = $total + $cat->product->price * $cat->quantity;
                  @endphp
                  @endforeach 
                  </tbody>
                  <tr>
                    <td colspan="3">Total</td>
                    <td>{{$total}}</td>
                    <td>BDT</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

              
      </div>
      <div class="col-md-6">
        <h1 class="h3 mb-2 text-gray-800">Create Brand</h1> 
        <form action="/order/create" method="post">
        @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
            <input type="text" name="id" id="name" value='<?php echo time(); ?>' class="sr-only">
          </div>
          <div class="form-group">
            <label for="number">Number</label>
            <input type="number" name="number" id="number" class="form-control">
          </div>
          <div class="form-group">
            <label for="total">Total</label>
            <input type="number" name="total" id="total" class="form-control" value="{{$total}}">
          </div>
          <div class="form-group">
            <label for="pay">Pay</label>
            <input type="number" name="pay" id="pay" class="form-control">
          </div>
          <input type="submit" value="Create" class="btn btn-info">
        </form>    
      </div>
    </div>
          
  

@endsection