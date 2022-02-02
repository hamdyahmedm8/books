@extends('layouts.book-layout')
@section('content')
@foreach($Books as $book)

    <h1><a href="{{url('/books/show',$book->id)}}">{{$book->name}}</a></h1>
    
    <p>{{$book->desc}}</p>
    <hr>
@endforeach
@endsection
