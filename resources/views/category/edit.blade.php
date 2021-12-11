@extends('layouts.app')
@section('content')
<div class="row">
   <div class="col-lg-12 margin-tb">
      <div class="row">
         <div class="pull-left col-12 col-md-9">
            <h2>Edit Categories</h2>
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
<form action="{{ route('category.update',$category->id) }}" method="POST">
   @csrf
   @method('PUT')
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>Title:</strong>
            <input type="text" name="title" value="{{ $category->title }}" class="form-control" placeholder="Title">
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-4">
         <button type="submit" class="btn btn-primary">Submit</button>
      </div>
   </div>
</form>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection