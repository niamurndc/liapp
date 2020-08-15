@extends('layouts.admin')

@section('admincontent')

          <h1 class="h3 mb-2 text-gray-800">All Users</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">User Tables</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>Country</th>
                      <th>Start date</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td>{{$user->firs_name}} {{$user->last_name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->address}}</td>
                      <td>{{$user->city}}</td>
                      <td>{{$user->country}}</td>
                      <td>{{$user->created_at}}</td>
                      <td>Delete</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
  

@endsection