@extends('layouts.book-layout')
@section('content')

@if($errors)
@foreach($errors->all()  as $error)
<div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif

<form action="{{url('books/update',$book->id)}}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
    <label for="exampleInputEmail1">Book Name</label>
    <input type="text" value="{{$book->name}}" name="name" class="form-control" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input type="text" value="{{$book->desc}}" name="desc" class="form-control" >
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" name="image" class="form-control" >
  </div>

    
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
