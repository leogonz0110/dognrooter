@extends('layouts.app')
@section('content')
<div class="row">
   <div class="col-lg-12 margin-tb">
      <div class="row">
         <div class="pull-left col-12 col-md-9">
            <h2>Show Products</h2>
         </div>
         <div class="pull-right col-12 col-md-3">
            <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
         <img src="/images/products/{{ $product->image }}" alt="">
      </div>
   </div>
   <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
         <strong>Name:</strong>
         {{ $product->name }}
      </div>
   </div>
   <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
         <strong>Category:</strong>
         {{ $product->name }}
      </div>
   </div>
   <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
         <strong>Content:</strong>
         {{ $product->content }}
      </div>
   </div>
</div>
@endsection