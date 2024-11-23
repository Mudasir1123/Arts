@extends('Admin.layout')

@section('content')
    <div class="container-fluid mt-4">
        <div class="bg-secondary rounded h-100 p-4">
            <h4 class="text-center text-primary mb-4">Update Order</h4>
            <form action={{ route('updateOrderStatus') }} method="GET">
                @csrf
                <!-- Customer Name -->
                <div class="mb-3">
                    <label for="customer_name" class="form-label fw-bold">Customer Name</label>
                    <input type="text" class="form-control border-primary" id="customer_name"
                        value={{ $data[0]->customer_name }} placeholder="Enter customer name" readonly>
                    <input type="text" class="form-control" id="id" name="id"
                        value="{{ $data[0]->order_id }}" hidden>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control border-primary" id="email" value="{{ $data[0]->email }}"
                        placeholder="Enter email address" readonly>
                </div>

                <!-- Phone -->
                <div class="mb-3">
                    <label for="phone" class="form-label fw-bold">Phone Number</label>
                    <input type="text" class="form-control border-primary" id="phone" value="{{ $data[0]->phone }}"
                        placeholder="Enter phone number" readonly>
                </div>

                <!-- Address -->
                <div class="mb-3">
                    <label for="address" class="form-label fw-bold">Address</label>
                    <textarea class="form-control border-primary" id="address" placeholder="Enter address" rows="3" readonly>{{ $data[0]->address }}</textarea>
                </div>

                <!-- Quantity -->
                <div class="mb-3">
                    <label for="quantity" class="form-label fw-bold">Total Quantity</label>
                    <input type="number" class="form-control border-primary" id="quantity"
                        value="{{ $data[0]->quantity }}" placeholder="Total Quantity" readonly>
                </div>

                <!-- Total Amount -->
                <div class="mb-3">
                    <label for="total_amount" class="form-label fw-bold">Total Amount</label>
                    <input type="number" class="form-control border-primary" id="total_amount"
                        value="{{ $data[0]->total_amount }}" placeholder="Total Amount" step="0.01" readonly>
                </div>

                <!-- Delivery Type -->
                <div class="mb-3">
                    <label for="delivery_type" class="form-label fw-bold">Delivery Type</label>
                    <select class="form-select border-primary" id="delivery_type" disabled>
                        <option value="">Select Delivery Type</option>
                        <option value="1" @if ($data[0]->delivery_type == 1) selected @endif>Standard</option>
                        <option value="2" @if ($data[0]->delivery_type == 2) selected @endif>Express</option>
                    </select>
                </div>

                <!-- Payment Status -->
                <div class="mb-3">
                    <label for="payment_status" class="form-label fw-bold">Payment Status</label>
                    <select class="form-select border-primary" id="payment_status" disabled>
                        <option value="">Select Payment Status</option>
                        <option value="Online" @if ($data[0]->payment_status == 'Online') selected @endif>Online</option>
                        <option value="COD" @if ($data[0]->payment_status == 'COD') selected @endif>Cash on Delivery (COD)
                        </option>
                    </select>
                </div>

                <!-- Account Number (Conditional) -->
                <div class="mb-3" id="account_number_field" style="display: none;">
                    <label for="account_number" class="form-label fw-bold">Bank Account Number</label>
                    <input type="text" class="form-control border-primary" id="account_number"
                        value="{{ $data[0]->account_number }}" placeholder="Enter Account Number" readonly>
                </div>

                <div class="mb-3">
                    <label for="order_status" class="form-label fw-bold">Order Status</label>
                    <select class="form-select border-primary" id="order_status" name="order_status" required>
                        <option value="">Select Order Status</option>
                        <option value="0" @if ($data[0]->order_status == 0) selected @endif>Pending</option>
                        <option value="1" @if ($data[0]->order_status == 1) selected @endif>Proccess</option>
                        <option value="2" @if ($data[0]->order_status == 2) selected @endif>Completed</option>
                        <option value="3" @if ($data[0]->order_status == 3) selected @endif>Cancle</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="text-center mt-4">
                    {{-- <button type="submit" class="btn btn-success px-4 py-2">Update Order</button> --}}
                    <input type="submit" value="Update Order" class="btn btn-success px-4 py-2">
                </div>
            </form>
        </div>
    </div>
@endsection
