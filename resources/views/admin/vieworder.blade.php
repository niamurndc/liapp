@extends('layouts.admin')

@section('admincontent')
<h1>Order Details ID: {{$order->id}}</h1>
<div class="row">
  
  <div class="col-md-6">
    <h4>Order Details</h4>
    <b>Order Name: {{$order->name}}</b> <br>
    <b>Order Number: {{$order->number}}</b> <br>
    <b>Order Time: {{$order->created_at}}</b> <br>
    <b>Order Update: {{$order->updated_at}}</b> <br>
    <hr>
    <h4>Payment Details</h4>
    <b>Pay Amount: {{$order->pay}}</b> <br>
    <b>Due Amount: {{$order->due}}</b> <br>
    <b>Total Payment: {{$order->total}}</b> <br>
  </div>


  <div class="col-md-6">
    
    <h4>Product Detials</h4>
    @php 
      $oid = $order->id;
      $carts = App\Cart::where('order_id', $oid)->get();
    @endphp
    
    <table class="table-striped table-bordered">
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach($carts as $cart)
          <tr>
            <td>{{$cart->product->name}}</td>
            <td>{{$cart->product->price}}</td>
            <td>{{$cart->quantity}}</td>
            <td>{{$cart->product->price * $cart->quantity}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection