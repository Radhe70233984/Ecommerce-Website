@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>Shopping Cart</h1>
    </div>
</div>

@if($cartItems->isEmpty())
    <div class="row mt-4">
        <div class="col-12">
            <div class="alert alert-info">Your cart is empty.</div>
            <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
        </div>
    </div>
@else
    <div class="row mt-4">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($item->product->image)
                                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" style="width: 60px; height: 60px; object-fit: cover;" class="me-2">
                                    @endif
                                    <div>
                                        <a href="{{ route('products.show', $item->product) }}">{{ $item->product->name }}</a>
                                    </div>
                                </div>
                            </td>
                            <td>${{ number_format($item->product->price, 2) }}</td>
                            <td>
                                <form action="{{ route('cart.update', $item) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="{{ $item->product->stock }}" style="width: 70px;" class="form-control form-control-sm">
                                    <button type="submit" class="btn btn-sm btn-secondary mt-1">Update</button>
                                </form>
                            </td>
                            <td>${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $item) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Order Summary</h5>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>Total:</span>
                        <strong>${{ number_format($total, 2) }}</strong>
                    </div>
                    <hr>
                    <a href="{{ route('checkout') }}" class="btn btn-primary w-100">Proceed to Checkout</a>
                    <a href="{{ route('home') }}" class="btn btn-secondary w-100 mt-2">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
