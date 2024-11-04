@extends('Admin.layout')

@section('content')
<div class="col-12">
    <div class="card bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Order Details</h6>

        <!-- Order Information Card -->
        <div class="card mb-3">
            <div class="card-header">
                <strong>Order Information</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Order ID</label>
                        <p class="card-text"></p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Customer Name</label>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Details Card -->
        <div class="card mb-3">
            <div class="card-header">
                <strong>Product Details</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Product Name</label>
                        <p class="card-text"></p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Quantity</label>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Price and Status Card -->
        <div class="card mb-3">
            <div class="card-header">
                <strong>Price and Status</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Total Price</label>
                        <p class="card-text"></p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Date Card -->
        <div class="card mb-3">
            <div class="card-header">
                <strong>Order Date</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Order Date</label>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        {{-- <div class="text-center mt-4">
            <a href="{{ route('orders.index') }}" class="btn btn-primary">Back to Orders</a>
            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">Update Order</a>
        </div> --}}
    </div>
</div>
@endsection
