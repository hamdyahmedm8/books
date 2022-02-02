@if($errors->all())
<ul class="list-unstyled alert alert-danger">

@foreach($errors->all() as $error)
<li>{{$error}}</li>

@endforeach
</ul>
@endif