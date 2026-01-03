@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h1>{{ $category->name }}</h1>
        <p class="lead">{{ $category->description }}</p>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-3">
        <h2>Products in this category</h2>
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
            <div class="alert alert-info">No products in this category.</div>
        </div>
    @endforelse
</div>

<div class="row">
    <div class="col-12">
        {{ $products->links() }}
    </div>
</div>
@endsection
