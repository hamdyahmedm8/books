

<a href="{{url('/books/list')}}">All Books</a>
@extends('layouts.book-layout')
@section('content')
@if(Auth::check() && Auth::user()->is_admin==1)
<a href="{{url('books/edit',$book->id)}}">Edit</a>
<a href="{{url('books/delete',$book->id)}}">delete</a>
@endif


<h1>{{$book->name}}</h1>
<p>{{$book->desc}}</p>
<img class="img-fluid" src="{{asset($book->image)}}" width="500"/>
<br/>
@foreach($book->categories as $category)
{{$category->name}} ,
@endforeach
<br/>

@endsection
