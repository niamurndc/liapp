@extends('layouts.admin')

@section('admincontent')

  <h1 class="h3 mb-2 text-gray-800">Edit News</h1>

  <!-- form Example -->

  <form action="/product/update/{{$product->id}}" method="post" class="col-md-6" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" class="form-control" value="{{$product->name}}">
    </div>
    <div class="form-group">
      <label for="category">Category</label>
      <select name="category" id="category" class="form-control">
        @foreach($cats as $cat)
          <option value="{{$cat->id}}" <?php echo  $cat->id == $product->category_id ? 'selected' : '' ?> >{{$cat->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="brand">Brand</label>
      <select name="brand" id="brand" class="form-control">
        @foreach($brands as $brand)
          <option value="{{$brand->id}}" <?php echo  $brand->id == $product->brand_id ? 'selected' : '' ?> >{{$brand->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="price">Price</label>
      <input type="number" name="price" id="price" class="form-control" value="{{$product->price}}">
    </div>
    <div class="form-group">
      <label for="amount">Qantity</label>
      <input type="number" name="amount" id="amount" class="form-control" value="{{$product->amount}}">
    </div>
    <div class="form-group">
      <p>Old Image</p>
      <img src="/uploads/product/{{$product->pimage}}" height="40px" width="60px">  
      <label for="cover">Image</label>
      
      <input type="file" name="cover" id="cover" class="form-control" value="{{$product->pimage}}">
    </div>
    <input type="submit" value="Publish" class="btn btn-info">
  </form>
          
@endsection