@extends('Admin.layout')

@section('content')
<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Products</h6>
        <a href="{{ url('addproduct') }}">
            <button type="button" class="btn btn-outline-info btn-sm">Add Product</button>
        </a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Product Code</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $product->product_code }}</td>
                            <td>
                                <img src="uploads/{{ $product->product_image }}" alt={{ $product->product_name }} height="80"
                                    width="auto">
                            </td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <a href="{{ route('viewproduct', $product->id) }}">
                                    <button type="button" class="btn btn-outline-success btn-sm">View</button>
                                </a>
                                <a href="{{ route('updateproducts', $product->id) }}">
                                    <button type="button" class="btn btn-outline-info btn-sm">Update</button>
                                </a>
                                <a href="{{ Route('productdelete', $product->id) }}">
                                    <button type="button" class="btn btn-outline-danger btn-sm">Delete</button>
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
