@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>Checkout</h1>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header">
                <h5>Order Summary</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>${{ number_format($item->product->price, 2) }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end">Total:</th>
                            <th>${{ number_format($total, 2) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>Shipping & Payment</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="shipping_address" class="form-label">Shipping Address</label>
                        <textarea class="form-control @error('shipping_address') is-invalid @enderror" id="shipping_address" name="shipping_address" rows="3" required>{{ old('shipping_address') }}</textarea>
                        @error('shipping_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Payment Method</label>
                        <select class="form-select @error('payment_method') is-invalid @enderror" id="payment_method" name="payment_method" required>
                            <option value="">Select payment method</option>
                            <option value="cash" {{ old('payment_method') === 'cash' ? 'selected' : '' }}>Cash on Delivery</option>
                            <option value="card" {{ old('payment_method') === 'card' ? 'selected' : '' }}>Credit/Debit Card</option>
                            <option value="paypal" {{ old('payment_method') === 'paypal' ? 'selected' : '' }}>PayPal</option>
                        </select>
                        @error('payment_method')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Place Order</button>
                    <a href="{{ route('cart.index') }}" class="btn btn-secondary w-100 mt-2">Back to Cart</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
