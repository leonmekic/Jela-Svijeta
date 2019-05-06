@extends('layout')

@section('content')

@foreach($meals->all() as $meal)
    <div>
        <a href="ingredients/{{$meal->id}}">{{$meal->title}}</a>
    </div>
@endforeach

@endsection