@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="row">
    <div class="col-md-6">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded" alt="{{ $product->name }}">
        @else
            <div class="bg-secondary d-flex align-items-center justify-content-center rounded" style="height: 400px;">
                <i class="bi bi-image text-white" style="font-size: 6rem;"></i>
            </div>
        @endif
    </div>
    <div class="col-md-6">
        <h1>{{ $product->name }}</h1>
        <p class="text-muted">Category: {{ $product->category->name }}</p>
        <h3 class="text-primary">${{ number_format($product->price, 2) }}</h3>
        <p>{{ $product->description }}</p>
        <p><strong>Stock:</strong> {{ $product->stock }} units available</p>
        
        @auth
            @if($product->stock > 0)
                <form action="{{ route('cart.add', $product) }}" method="POST" class="mb-3">
                    @csrf
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" max="{{ $product->stock }}" style="width: 100px;">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-cart-plus"></i> Add to Cart
                    </button>
                </form>
            @else
                <div class="alert alert-warning">Out of stock</div>
            @endif
        @else
            <div class="alert alert-info">Please login to add items to cart.</div>
        @endauth

        <div class="mt-3">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
        </div>
    </div>
</div>
@endsection
