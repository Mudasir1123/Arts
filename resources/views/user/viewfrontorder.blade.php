@extends('user.layout')
@section('content')
    <div class="col-12">
        <div class="rounded h-100 p-4" style="background-color: rgb(127, 173, 57); color: white;">
            <h6 class="mb-4">Order Details</h6>

            <!-- Order Information -->
            <div class="card mb-4" style="background-color: white; color: rgb(127, 173, 57);">
                <div class="card-header" style="background-color: rgb(127, 173, 57); color: white;">
                    <h5>Order #{{ $orderItems[0]->id }}</h5>
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
                            @if ($orderItems[0]->delivery_type == '1')
                                Standard
                            @elseif($orderItems[0]->delivery_type == '2')
                                Express
                            @endif <br>
                            <strong>Payment Status:</strong> {{ $orderItems[0]->payment_status }} <br>
                            <strong>Order Status:</strong>@if ($orderItems[0]->order_status == 0)
                                Pending
                            @elseif($orderItems[0]->order_status == 1)
                                Proccess
                            @elseif($orderItems[0]->order_status == 2)
                                Completed
                            @elseif($orderItems[0]->order_status == 3)
                                Cancle
                            @endif <br>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products in the Order -->
            <div class="card" style="background-color: white; color: rgb(127, 173, 57);">
                <div class="card-header" style="background-color: rgb(127, 173, 57); color: white;">
                    <h5>Products</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>

                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalAmount = 0; // Initialize a variable to hold the total amount
                            @endphp
                            @foreach ($orderItems as $key => $item)
                                @php
                                    $subtotal = $item->item_price * $item->item_quantity; // Calculate subtotal for each item
                                    $totalAmount += $subtotal; // Add the subtotal to the total amount
                                @endphp
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/' . $item->product_image) }}"
                                            alt="{{ $item->product_name }}" style="width: 50px; height: auto;">
                                        {{ $item->product_name }}
                                    </td>
                                    <td>{{ $item->item_quantity }}</td>
                                    <td>Rs:{{ number_format($item->item_price, 2) }}</td>
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

            <!-- Feedback Form -->
            <div class="card mt-4" style="background-color: white; color: rgb(127, 173, 57);">
                <div class="card-header" style="background-color: rgb(127, 173, 57); color: white;">
                    <h5>Product Feedback</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('feedback.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $orderItems[0]->id }}">
                        <div class="row">
                            @foreach ($orderItems as $item)
                                <div class="col-md-12 mb-3">
                                    <label for="feedback_{{ $item->id }}"
                                        class="form-label">{{ $item->product_name }}</label>
                                    <textarea class="form-control" id="feedback_{{ $item->id }}" name="feedback[{{ $item->id }}]" rows="3"
                                        placeholder="Write your feedback"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="rating_{{ $item->id }}" class="form-label">Rating</label>
                                    <select class="form-select" id="rating_{{ $item->id }}"
                                        name="rating[{{ $item->id }}]" required>
                                        <option value="">Select Rating</option>
                                        <option value="1">1 Star</option>
                                        <option value="2">2 Stars</option>
                                        <option value="3">3 Stars</option>
                                        <option value="4">4 Stars</option>
                                        <option value="5">5 Stars</option>
                                    </select>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn"
                            style="background-color: rgb(127, 173, 57); color: white;">Submit Feedback</button>

                        {{-- <a href="{{ route('feedback.show', $order->id) }}">  <button  class="btn" style="background-color: rgb(127, 173, 57); color: white;">Show Feedback</button> </a> --}}
                    </form>
                </div>
            </div>


            <div class="text-end mt-3">
                <a href="{{ route('frontorder') }}" class="btn"
                    style="background-color: rgb(127, 173, 57); color: white;">Back to Orders</a>
            </div>
        </div>
    </div>
@endsection
