@extends('layout')

@section('content')

<li>
    {{$tag->title}} - meals: {{$tag->meal}}
</li>

@endsection