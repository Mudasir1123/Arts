@extends('Admin.layout')

@section('content')
<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Category</h6>
        <a href="{{ url('addcategory') }}">
            <button type="button" class="btn btn-outline-info btn-sm">Add Category</button>
        </a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Category Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $category->name }}</td>
                        <td>
                            @if($category->image)
                            <img src="{{ asset('uploads/categories/' . $category->image) }}" 
                                 alt="{{ $category->name }}" 
                                 style="width: 250px; height: 100px; object-fit: cover;">
                            @else
                            <span>No Image</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('viewCategory', ['id' => $category->id]) }}">
                                <button type="button" class="btn btn-outline-success btn-sm">View</button>
                            </a>
                            <a href="{{ route('updateCategory.form', ['id' => $category->id]) }}">
                                <button type="button" class="btn btn-outline-info btn-sm">Update</button>
                            </a>
                            <a href="{{ route('deleteCategory', ['id' => $category->id]) }}">
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
