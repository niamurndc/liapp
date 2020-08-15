@extends('layouts.admin')

@section('admincontent')
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

  
  @php
    $products = App\Product::all();
  @endphp

  @foreach($products as $product)
    @if($product->amount < 5)
      <div class="alert-danger">
        <p>Stock of <strong>{{$product->name}}</strong> is very <strong>Low</strong></p>
      </div>
    @else
    @endif
  @endforeach

@endsection