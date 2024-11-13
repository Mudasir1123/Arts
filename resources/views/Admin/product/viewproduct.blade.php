@extends('Admin.layout')

@section('content')
    <div class="container">
        <div class="row">
                <div class="col-12 mb-4 mt-4">
                    <div class="card">
                        <img src="{{ asset('uploads/' . $product->product_image) }}" 
                             class="card-img-top" 
                             alt="{{ $product->product_name ?? 'Default Image' }}" 
                             style="height: auto; object-fit: cover; width: 100%;">
                        <div class="card-body">
                            <h2 class="card-title">{{ $product->product_name }}</h2>
                            <p class="card-text">Code: {{ $product->product_code }}</p>
                            <p class="card-text">Description: {{ $product->description }}</p>
                            <p class="card-text">Price: Rs:{{ number_format($product->price, 2) }}</p>
                            <p class="card-text">Stock: {{ $product->stock }}</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
