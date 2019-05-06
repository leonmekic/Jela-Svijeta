@extends('layout')

@section('content')
<ul>
    @foreach($categories->all() as $category)
    <li><a href="/category/{{$category->id}}">{{$category->title}}</a></li>
    @endforeach
</ul>
<!-- {{$categories->all()}} -->
<!-- docker exec -it web-app /bin/bash -->
@endsection