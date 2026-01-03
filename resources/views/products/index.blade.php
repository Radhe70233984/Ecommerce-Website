@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <h1>All Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
    </div>
</div>

<div class="row">
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
                    <p class="text-muted">{{ $product->category->name }}</p>
                    <p class="card-text"><strong>${{ number_format($product->price, 2) }}</strong></p>
                    <div class="btn-group" role="group">
                        <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info">No products found.</div>
        </div>
    @endforelse
</div>

<div class="row">
    <div class="col-12">
        {{ $products->links() }}
    </div>
</div>
@endsection
