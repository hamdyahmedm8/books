
@extends('layouts.book-layout')
@section('content')

@if($errors)
@foreach($errors->all()  as $error)
<div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif

<form action="{{url('books/store')}}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
    <label for="exampleInputEmail1">Book Name</label>
    <input type="text" value="{{old('name')}}" name="name" class="form-control" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input type="text" value="{{old('desc')}}" name="desc" class="form-control" >
  </div>
  
<div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" name="image" class="form-control" >
  </div>
  @foreach($categories as $cat)
    <input type="checkbox" name="categories[]" value="{{$cat->id}}"/> {{$cat->name}}
    @endforeach

    
  <button type="submit" class="btn btn-primary">Add Book</button>
</form>
@endsection


