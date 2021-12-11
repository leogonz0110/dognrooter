@extends('layouts.app')
@section('content')
<div class="row">
   <div class="col-lg-12 margin-tb">
   <div class="row">
         <div class="pull-left col-12 col-md-9">
            <h2>Show Category</h2>
         </div>
         <div class="pull-right col-12 col-md-3">
            <a class="btn btn-primary" href="{{ route('category.index') }}"> Back</a>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
         <strong>Title:</strong>
         {{ $category->title }}
      </div>
   </div>
</div>
@endsection