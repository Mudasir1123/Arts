@extends('Admin.layout')

@section('content')
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Order List</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Delivery Type</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $order)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->total_amount }}</td>
                                <td>{{ $order->delivery_type == '1' ? 'Standard' : 'Express' }}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    @if ($order->order_status == 0)
                                        Pending
                                    @elseif($order->order_status == 1)  
                                        Proccess
                                    @elseif($order->order_status == 2)  
                                        Completed  
                                    @elseif($order->order_status == 3)  
                                        Cancle      
                                    @endif      
                                </td>
                                <td>
                                    <a href="{{ route('vieworder', $order->id) }}"
                                        class="btn btn-outline-success btn-sm">View</a>
                                    <a href="{{ route('updateorder', $order->id) }}">
                                        <button type="button" class="btn btn-outline-info btn-sm">Update</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
