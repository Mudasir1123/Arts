@extends('Admin.layout')

@section('content')
<div class="bg-secondary rounded p-4">
    <!-- Product Details -->
    <h6 class="mb-4">Add category</h6>
    <form action="/category" method="POST" enctype="multipart/form-data" class="w-100">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <input type="submit" class="btn btn-success" value="Add category" />
    </form>
</div>
@endsection
