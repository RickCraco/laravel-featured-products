@extends('layouts.app')

@section('title', 'Home')

@section('content')
<main>
    <h1>Home page</h1>

    @foreach ($products as $product)
        <h2>{{ $product->name }}, {{$product->category->name}}</h2>
    @endforeach
</main>

@endsection
