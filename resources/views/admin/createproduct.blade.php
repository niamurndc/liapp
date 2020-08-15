@extends('layouts.admin')

@section('admincontent')

  <h1 class="h3 mb-2 text-gray-800">Create News</h1>

  <!-- form Example -->

  <form action="/product/create" method="post" class="col-md-6" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" class="form-control">
    </div>
    <div class="form-group">
      <label for="category">Category</label>
      <select name="category" id="category" class="form-control">
        @foreach($cats as $cat)
          <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="brand">Brand</label>
      <select name="brand" id="brand" class="form-control">
        @foreach($brands as $brand)
          <option value="{{$brand->id}}">{{$brand->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="price">Price</label>
      <input type="number" name="price" id="price" class="form-control">
    </div>
    <div class="form-group">
      <label for="amount">Qantity</label>
      <input type="number" name="amount" id="amount" class="form-control">
    </div>
    <div class="form-group">
      <label for="cover">Main Image</label>
      <input type="file" name="cover" id="cover" class="form-control">
    </div>
    <input type="submit" value="Publish" class="btn btn-info">
  </form>
          
@endsection