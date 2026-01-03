@extends('layouts.app')

@section('title', 'Home - Ecommerce Website')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="jumbotron bg-light p-5 rounded">
            <h1 class="display-4">Welcome to Our Store!</h1>
            <p class="lead">Find the best products at amazing prices.</p>
            <hr class="my-4">
            <p>Browse our collection and start shopping today.</p>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-12">
        <h2>Categories</h2>
    </div>
    @foreach($categories as $category)
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $category->name }}</h5>
                    <p class="card-text text-muted">{{ $category->products_count }} products</p>
                    <a href="{{ route('categories.show', $category) }}" class="btn btn-primary btn-sm">View Products</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    <div class="col-12 mb-3">
        <h2>Latest Products</h2>
    </div>
    @forelse($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                @else
                    <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="bi bi-image text-white" style="font-size: 4rem;"></i>
                    </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($product->description, 100) }}</p>
                    <p class="card-text"><strong>${{ number_format($product->price, 2) }}</strong></p>
                    <a href="{{ route('products.show', $product) }}" class="btn btn-primary btn-sm">View Details</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info">No products available at the moment.</div>
        </div>
    @endforelse
</div>

<div class="row">
    <div class="col-12">
        {{ $products->links() }}
    </div>
</div>
@endsection
