@extends('layout')

@section('content')

@foreach($tags->all() as $tag)
<a href="/tag/{{$tag->id}}">{{$tag->title}}</a><br>
@endforeach

@endsection