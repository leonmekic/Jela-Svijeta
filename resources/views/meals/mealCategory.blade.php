@extends('layout')

@section('content')

<li>
{{$category->title}} - meals: {{$category->meal}}
</li>

@endsection