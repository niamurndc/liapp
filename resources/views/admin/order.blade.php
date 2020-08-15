@extends('layouts.admin')

@section('admincontent')

          <h1 class="h3 mb-2 text-gray-800">All Orders</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Order Tables</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Time</th>
                      <th>Name</th>
                      <th>Number</th>
                      <th>Pay</th>
                      <th>Total</th>
                      <th>Due</th>
                      <th>View</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)
                    <tr>
                      <td>{{ $order->created_at }}</td>
                      <td>{{ $order->name }}</td>
                      <td>{{ $order->number }}</td>
                      <td>
                        @if($order->due == 0)
                          {{$order->pay}}
                        @else
                        <form action="/order/edit/{{$order->id}}" method="post"> @csrf
                          <input type="number" name="pay" value="{{ $order->pay }}" min="{{ $order->pay }}" max="{{$order->total}}" >
                          <input type="number" name="total" value="{{ $order->total }}" class="sr-only">
                          <input type="submit" value="Add Cart" class="btn btn-info btn-sm">
                        </form>
                        @endif
                      </td>
                      <td>{{ $order->total }}</td>
                      <td>
                        @if($order->due == 0)
                          <a href="#" class="btn btn-success btn-sm disabled">Complete</a>
                        @else
                          {{ $order->due }}
                        @endif
                      </td>
                      <td>
                        <a href="/order/view/{{$order->id}}" class="btn btn-primary btn-circle"><i class="far fa-eye"></i></a> 
                      </td>
                      <td>
                      <td>
                        <a href="/order/delete/{{$order->id}}" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a> 
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
  

@endsection