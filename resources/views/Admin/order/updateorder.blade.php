@extends('Admin.layout')

@section('content')

<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Order Details</h6>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="orderId" class="form-label">Order ID</label>
                <input type="text" class="form-control" id="orderId"  readonly>
            </div>
            <div class="col-md-6">
                <label for="customerName" class="form-label">Customer Name</label>
                <input type="text" class="form-control" id="customerName"  readonly>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="productName"  readonly>
            </div>
            <div class="col-md-6">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity"  readonly>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="totalPrice" class="form-label">Total Price</label>
                <input type="text" class="form-control" id="totalPrice"  readonly>
            </div>
            <div class="col-md-6">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status"  readonly>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="createdAt" class="form-label">Order Date</label>
                <input type="text" class="form-control" id="createdAt"  readonly>
            </div>
        </div>
       <button  class="btn btn-success">Save Order </button>
    </div>
</div>

@endsection
