@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>My Orders</h1>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        @forelse($orders as $order)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h5>Order #{{ $order->id }}</h5>
                            <p class="mb-1"><strong>Date:</strong> {{ $order->created_at->format('M d, Y') }}</p>
                            <p class="mb-1"><strong>Status:</strong> 
                                <span class="badge bg-{{ $order->status === 'completed' ? 'success' : ($order->status === 'cancelled' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </p>
                            <p class="mb-1"><strong>Total:</strong> ${{ number_format($order->total_amount, 2) }}</p>
                            <p class="mb-1"><strong>Items:</strong> {{ $order->orderItems->count() }}</p>
                        </div>
                        <div class="col-md-4 d-flex align-items-center justify-content-end">
                            <a href="{{ route('orders.show', $order) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info">You haven't placed any orders yet.</div>
            <a href="{{ route('home') }}" class="btn btn-primary">Start Shopping</a>
        @endforelse

        {{ $orders->links() }}
    </div>
</div>
@endsection
