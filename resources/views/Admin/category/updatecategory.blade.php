@extends('Admin.layout')

@section('content')
<div class="container-fluid">
    <div class="bg-secondary rounded p-4">
        <h6 class="mb-4">Update Category</h6>
        <form action="{{ route('updateCategory.submit', ['id' => $category->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" 
                       value="{{ old('name', $category->name) }}" placeholder="Enter category name" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image (optional)</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <input type="submit" class="btn btn-success" value="Update Category" />
        </form>
    </div>
</div>
@endsection
