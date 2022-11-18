
@extends('layout')
@section('content')
<?php
  $message = Session::get('message');
  if($message){
    echo $message;
    Session::put('message', null);
  }
?>
<form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">

    <label for="exampleFormControlInput1">Name Product</label>
    <input type="text" class="form-control" name="product_name" placeholder="Tên sản phẩm">

    <label for="exampleFormControlInput1">Slug</label>
    <input type="text" class="form-control" name="product_slug" placeholder="Tên sản phẩm">


    <label for="exampleFormControlSelect1">Category</label>
    <select class="form-control" name="category_id">
      <option value="1">1</option>
      <option value="1">2</option>
      <option value="1">3</option>
      <option value="1">4</option>
      <option value="1">5</option>
    </select>

    <label for="exampleFormControlSelect1">Brand</label>
    <select class="form-control" name="brand_id">
      <option value="1">1</option>
      <option value="1">2</option>
      <option value="1">3</option>
      <option value="1">4</option>
      <option value="1">5</option>
    </select>

    <label for="exampleFormControlTextarea1">Product Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="product_desc" rows="3"></textarea>

    <label for="exampleFormControlTextarea1">Product Content</label>
    <textarea class="form-control"id="exampleFormControlTextarea2" name="product_content" rows="3"></textarea>

    <label for="exampleFormControlTextarea1">Price</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">$</span>
      </div>
      <input type="text"class="form-control" name="product_price" aria-label="Amount (to the nearest dollar)">
      <div class="input-group-append">
        <span class="input-group-text">.00</span>
      </div>
    </div>

    <label for="exampleFormControlFile1">image</label>
    <input type="file" name="product_image" class="form-control-file" id="exampleFormControlFile1">

    <label for="exampleFormControlSelect1">Status</label>
    <select class="form-control" name="product_status">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>

    <br/>

    <button type="submit" class="btn btn-primary">Send</button>

  </div>
</form>
@endsection