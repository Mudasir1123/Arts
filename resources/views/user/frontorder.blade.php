@extends('user.layout')
@section('content')
    <div class="col-12">
        <div style="border-radius: 8px; padding: 20px;">
            <h6 class="mb-4" style="text-align: center; font-weight: bold; color:rgb(127, 173, 57);">Order List</h6>
            <div class="table-responsive">
                <table class="table" style="border-collapse: collapse; width: 100%; text-align: center;">
                    <thead style="background-color:rgb(127, 173, 57); color: #fff;">
                        <tr>
                            <th scope="col">S.No</th>
                            {{-- <th scope="col">Order ID</th> --}}
                            <th scope="col">Customer Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Delivery Type</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Order Status</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $order)
                            <tr
                                style="background-color: {{ $loop->odd ? '#ffffff' : 'rgb(127, 173, 57)' }};color: {{ $loop->odd ? '#000' : '#ffffff' }}">
                                <th scope="row">{{ $loop->iteration }}</th>
                                {{-- <td>{{ $order->id }}</td> --}}
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>Rs:{{ number_format($order->total_amount, 2) }}</td>
                                <td>{{ $order->delivery_type == '1' ? 'Standard' : 'Express' }}</td>
                                <td>{{ $order->payment_status }}</td>
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
                                <td>{{ $order->created_at }}</td>

                                <td>
                                    <a href="{{ route('viewfrontorder', $order->id) }}"
                                        class="btn btn-outline-success btn-sm"
                                        style="background-color: white; color: green;">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
