@extends('layouts.book-layout')
@section('content')
@if($errors)
@foreach($errors->all()  as $error)
<div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif
<form action="{{url('categories/save')}}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" value="{{old('name')}}" name="name" class="form-control" >
  </div>
  <button type="submit" class="btn btn-primary">Add Category</button>
</form>
@foreach($categories as $category)
<h5>{{$category->name}}</h5>
@foreach($category->books as $book)
{{$book->name}} - 
@endforeach
@endforeach
@endsection

