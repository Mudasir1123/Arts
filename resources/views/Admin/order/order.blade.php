@extends('Admin.layout')

@section('content')
<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Order List</h6>
        
        <!-- Orders Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Order Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <thead class="thead-dark">
                    <tr>
                        <th>1234567/th>
                        <th>Shehran Ahmed</th>
                        <th>Mobile</th>
                        <th>2</th>
                        <th>500</th>
                        <th>pending</th>
                        <th>20 12 2024</th>
                        <th>Actions</th>
                        <td>
                            <a href="{{ url('detailorder') }}">    <button type="button" class="btn btn-outline-success btn-sm">View</button>   </a>
                                <a href="{{ url('updateorder') }}">   <button type="button" class="btn btn-outline-info btn-sm">Update</button>   </a>
                        </td> 
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->product_name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>${{ $order->total_price }}</td>
                        <td>
                            <span class="badge 
                                @if($order->status == 'Pending') bg-warning
                                @elseif($order->status == 'Shipped') bg-info
                                @elseif($order->status == 'Delivered') bg-success
                                @else bg-danger
                                @endif
                            ">{{ $order->status }}</span>
                        </td>
                        <td>{{ $order->created_at->format('Y-m-d') }}</td>
                        <td>
                            <!-- View Order Button -->
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-primary">View</a>
                            <!-- Update Order Button -->
                            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-warning">Update</a>
                        </td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>

        <!-- Pagination Links (Optional if you use pagination) -->
        {{-- {{ $orders->links() }} --}}

    </div>
</div>
@endsection
