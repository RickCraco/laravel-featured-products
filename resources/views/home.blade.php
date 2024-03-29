@extends('layouts.app')

@section('title', 'Home')

@section('content')
<main>

    <div class="container">
        <h1>Our products</h1>

        <form action="/" method="GET">
            <select name="category" id="category">
                <option value="">All</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit">Filter</button>
        </form>

        <div class="row">
            @foreach ($products as $product)
                <div class="card col-3 mx-2">
                    <div class="card-body">
                        <span>{{$product->featured}}</span>
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $product->category->name }}</h6>
                        <p class="card-text">{{ $product->description }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary">Show</a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</main>

@endsection
