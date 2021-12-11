@extends('layouts.app')
@section('content')
<div class="row">
   <div class="col-lg-12 margin-tb">
      <div class="row">
         <div class="pull-left col-12 col-md-9">
            <h2>Edit Products</h2>
         </div>
         <div class="pull-right col-12 col-md-3">
            <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
         </div>
      </div>
   </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
   <strong>Whoops!</strong> There were some problems with your input.<br><br>
   <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
   </ul>
</div>
@endif
<form action="{{ route('product.update',$product->id) }}" method="POST">
   @csrf
   @method('PUT')
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>Name:</strong>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name">
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>Category</strong>
            <select  class="form-control" name="product_category">
            @foreach ($categories as $category)
            
               <option value="{{ $category->id }}" {{ $product->categoryPerProduct->category_id == $category->id ? 'selected' : ''; }}>{{ $category->title }}</option>
            @endforeach
            </select>
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>Product Image:</strong>
            <img src="/images/products/{{ $product->image }}" alt="">
            <input type="file" name="image" class="form-control" placeholder="Image">
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>Content:</strong>
            <textarea class="form-control ckeditor" style="height:150px" name="content" placeholder="Detail"></textarea>
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
         <button type="submit" class="btn btn-primary">Submit</button>
      </div>
   </div>
</form>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection