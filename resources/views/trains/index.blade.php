@extends('layouts.app')

@section('title', 'All trains')

@section('content')

<h1>All trains</h1>

<ul>
    @foreach ($trains as $train)
    <li>{{ $train }}</li>
    @endforeach
</ul>

@endsection