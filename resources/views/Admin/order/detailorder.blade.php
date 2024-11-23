@extends('Admin.layout')

@section('content')
<div class="col-12">
    <div class=" rounded h-100 p-4" style="background-color: #191C24">
        <h6 class="mb-4 text-white">Order Details</h6>
        
        <!-- Order Information -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 style="color:#191C24">Order #{{ $orderItems[0]->id }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <strong>Customer Name:</strong> {{ $orderItems[0]->customer_name }} <br>
                        <strong>Email:</strong> {{ $orderItems[0]->email }} <br>
                        <strong>Phone:</strong> {{ $orderItems[0]->phone }} <br>
                        <strong>Address:</strong> {{ $orderItems[0]->address }} <br>
                    </div>
                    <div class="col-md-6">
                        <strong>Total Quantity:</strong> {{ $orderItems->sum('item_quantity') }} <br>
                        <strong>Total Amount:</strong> Rs:{{ number_format($orderItems[0]->total_amount, 2) }} <br>
                        <strong>Delivery Type:</strong> 
                        @if($orderItems[0]->delivery_type == '1') Standard
                        @elseif($orderItems[0]->delivery_type == '2') Express
                        @endif <br>
                        <strong>Payment Status:</strong> {{ $orderItems[0]->payment_status }} <br>
                        @if($orderItems[0]->payment_status == 'Online')
                            <strong>Account Number:</strong> {{ $orderItems[0]->account_number }} <br>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Products in the Order -->
        <div class="card">
            <div class="card-header">
                <h5 style="color:#191C24">Products</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalAmount = 0;  // Initialize a variable to hold the total amount
                        @endphp
                        @foreach($orderItems as $key => $item)
                            @php
                                $subtotal = $item->item_price * $item->item_quantity;  // Calculate subtotal for each item
                                $totalAmount += $subtotal;  // Add the subtotal to the total amount
                            @endphp
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <img src="{{ asset('uploads/' . $item->product_image) }}" alt="{{ $item->product_name }}" style="width: 50px; height: auto;">
                                    {{ $item->product_name }}
                                </td>
                                <td>{{ $item->item_quantity }}</td>
                                <td>Rs:{{ number_format($item->item_price, 2) }}</td>
                                <td>Rs:{{ number_format($subtotal, 2) }}</td>
                                <td>{{ $item->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <!-- Display the total amount at the bottom of the table -->
                <div class="row">
                    <div class="col-12 text-end">
                       Total Amount: Rs: <strong>{{ number_format($totalAmount, 2) }}</strong>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="text-end mt-3">
            <a href="{{ route('order') }}" class="btn btn-secondary">Back to Orders</a>
        </div>
    </div>
</div>
@endsection
