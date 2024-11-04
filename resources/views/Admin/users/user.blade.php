@extends('Admin.layout')

@section('content')
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Products</h6>
            <a href="{{ url('adduser') }}">
                <button type="button" class="btn btn-outline-info btn-sm">Add User</button>
            </a>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Role</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->mobile }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <img src="uploads/{{ $user->image }}" alt={{ $user->name }} height="80"
                                        width="auto">
                                </td>
                                <td>
                                    <a href="{{ Route('viewuser', $user->id) }}">
                                        <button type="button" class="btn btn-outline-success btn-sm">View</button>
                                    </a>
                                    <a href="{{ Route('updateuser', $user->id) }}">
                                        <button type="button" class="btn btn-outline-info btn-sm">Update</button>
                                    </a>
                                    <a href="{{ Route('deleteuser', $user->id) }}">
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
