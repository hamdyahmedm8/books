@extends('layouts/book-layout')

@section('title')
Login
@endsection
@section('content')
<h1>Login</h1>
@include('users.errors')
<form action="{{url('users/handleloign')}}" method="post">
  @csrf
    <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">email: hamdy@gmail.com</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    <small id="emailHelp" class="form-text text-muted">password: 123456</small>
 
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
@endsection
