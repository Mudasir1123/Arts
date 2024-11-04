@extends('Admin.layout')

@section('content')
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <!-- Product Details -->
            <h6 class="mb-4">Update Product</h6>
            <form action="{{ route('updateproduct') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="product_code" class="form-label">Product Code</label>
                    <input type="text" class="form-control" id="product_code" name="product_code"
                        value="{{ $product[0]->product_code ?? '' }}" placeholder="Enter unique product code" required>
                </div>

                <div class="mb-3">
                    <label for="product_image" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="product_image" name="file">
                    <small>Current Image: {{ $product[0]->product_image ?? 'No image available' }}</small>
                </div>

                <div class="mb-3">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name"
                        value="{{ $product[0]->product_name ?? '' }}" placeholder="Enter product name" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Enter product description"
                        rows="3">{{ $product[0]->description ?? '' }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price"
                        value="{{ $product[0]->price ?? '' }}" placeholder="Enter product price" step="0.01" required>
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock"
                        value="{{ $product[0]->stock ?? '' }}" placeholder="Enter stock quantity" required>
                </div>

                <!-- Category Select Field -->
                {{-- <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-control" id="category_id" name="category_id" required>
                        <option value="">Select a Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                {{ ($product[0]->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach 
                    </select>
                </div> --}}

                <input type="submit" class="btn btn-success" value="Update Product" />
            </form>
        </div>
    </div>
@endsection
