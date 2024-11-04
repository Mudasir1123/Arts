@extends('Admin.layout')

@section('content')
<div class="container">
    <div class="row">
        @if($products->isEmpty())
            <div class="col-12">
                <p>No products found for this category.</p>
            </div>
        @else
            {{-- @foreach ($products as $product) --}}
                <div class="col-12">
                    <div class="card">
                        {{-- Display the product image if available --}}
                            <img src="{{ asset('uploads/categories/' . $products[0]->image) }}" class="card-img-top" alt="{{ $products[0]->name }}">
                        <div class="card-body">
                            <h5 class="card-title text-dark">{{ $products[0]->name }}</h5>
                           
                    </div>
                </div>
            {{-- @endforeach --}}
        @endif
    </div>
</div>

@endsection
