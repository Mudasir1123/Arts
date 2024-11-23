@extends('layout')

@section('content')
    <h1>Feedback for Order #{{ $orderDetails->id }}</h1>

    <div class="card mt-4">
        <div class="card-header">
            <h5>Order Details</h5>
        </div>
        <div class="card-body">
            <p><strong>Total Amount:</strong> Rs: {{ number_format($orderDetails->total_amount, 2) }}</p>
            <p><strong>Order Date:</strong> {{ $orderDetails->created_at }}</p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h5>Customer Feedback</h5>
        </div>
        <div class="card-body">
            @if ($feedbacks->isEmpty())
                <p>No feedback for this order yet.</p>
            @else
                <ul>
                    @foreach ($feedbacks as $feedback)
                        <li>
                            <strong>Product:</strong> {{ $feedback->product_name }}<br>
                            <strong>Rating:</strong> {{ $feedback->rating }} stars<br>
                            <strong>Feedback:</strong> {{ $feedback->feedback }}
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
