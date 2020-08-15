@extends('layouts.admin')

@section('admincontent')

          <h1 class="h3 mb-2 text-gray-800">All News</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">News Tables</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Cover Image</th>
                      <th>Category</th>
                      <th>Brand</th>
                      <th>Qantity</th>
                      <th>Price</th>
                      <th>View</th>
                      <th>edit </th>
                      <th>delete </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)
                    <tr>
                      <td>{{ $product->name }}</td>
                      <td><img src="/uploads/product/{{ $product->pimage }}" alt="Cover" height="40px" width="40px"></td>
                      <td>{{ $product->category->name }}</td>
                      <td>{{ $product->brand->name }}</td>
                      <td>{{ $product->price }}</td>
                      <td>{{ $product->amount }}</td>
                      <td>
                        @if($product->amount == 0)
                        <p class="text-danger">Out of Stock</p>
                        @else
                        <form action="/cart/create" method="post"> @csrf
                          <input type="text" name="pid" class="sr-only" value="{{$product->id}}">
                          <input type="number" name="quantity" value="1" min="1" max="{{ $product->amount }}" >
                          <input type="submit" value="Add Cart" class="btn btn-info btn-sm">
                        </form>
                        @endif
                      </td>
                      <td>
                        <a href="/product/edit/{{$product->id}}" class="btn btn-warning btn-circle"><i class="fas fa-pen"></i></a> 
                      </td>
                      <td>
                        <a href="/product/delete/{{$product->id}}" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a> 
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
  

@endsection