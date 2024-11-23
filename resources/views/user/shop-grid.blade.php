@extends('user.layout')

@section('content')

<div class="container">
<div class="row mt-5">
    @foreach ($products as $product)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <a href="{{ route('shop-details', $product->id) }}">
                <div class="card mt-5">
                    <img src="{{ asset('uploads/' . $product->product_image) }}" class="card-img-top"
                        alt="{{ $product->product_name ?? 'Default Image' }}" style="height: 250px; width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
</div>

    @endsection