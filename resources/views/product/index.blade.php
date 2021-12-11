@extends('layouts.app')
@section('content')
<div class="row">
   <div class="col-lg-12 margin-tb">
      <div class="row">
         <div class="pull-left col-12 col-md-9">
            <h2>Products</h2>
         </div>
         <div class="pull-right col-12 col-md-3">
            <a class="btn btn-success" href="{{ route('product.create') }}"> Create New Product</a>
         </div>
      </div>
   </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
   <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
   <tr>
      <th>No</th>
      <th>Name</th>
      <th width="280px">Action</th>
   </tr>
   @foreach ($products as $product)
   <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $product->name }}</td>
      <td>
         <form action="{{ route('product.destroy',$product->id) }}" method="POST">
            <a class="btn btn-info" href="{{ route('product.show',$product->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
         </form>
      </td>
   </tr>
   @endforeach
</table>
@endsection