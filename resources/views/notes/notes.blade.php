
@extends('layouts.book-layout')
@section('content')

@if($errors)
@foreach($errors->all()  as $error)
<div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif
<form action="{{url('users/savenote')}}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
    <label for="exampleInputEmail1">Content</label>
    <input type="text" value="{{old('content')}}" name="content" class="form-control" >
  </div>
  <button type="submit" class="btn btn-primary">Add Note</button>
</form>
@foreach(Auth::user()->notes as $note)
<h4>{{$note->content}} - {{$note->user->id}}</h4>
@endforeach
@endsection


