@extends('layouts.app')
@section('content')
<div class="row">
   <div class="col-lg-12 margin-tb">
      <div class="row">
         <div class="pull-left col-12 col-md-9">
            <h2>Add New Category</h2>
         </div>
         <div class="pull-right col-12 col-md-3">
            <a class="btn btn-primary" href="{{ route('category.index') }}"> Back</a>
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
<form action="{{ route('category.store') }}" method="POST"  enctype="multipart/form-data">
   @csrf
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>Title:</strong>
            <input type="text" name="title" class="form-control" placeholder="Title">
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-4">
         <button type="submit" class="btn btn-primary">Submit</button>
      </div>
   </div>
</form>
@endsection