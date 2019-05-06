@extends('layout')

@section('content')
{{$meal->title}} ingredients : {{trim($meal->ingredient->pluck('title'), '[], ""')}}
@endsection