@extends('Admin.layout')

@section('content')
<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Edit User</h6>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="id" value="{{ $data[0]->id }}" hidden>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" value="{{ $data[0]->name }}" id="name" name="name" placeholder="Enter your name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" value="{{ $data[0]->email }}" name="email" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password (leave blank to keep current)</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            </div>

            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="number" class="form-control" value="{{ $data[0]->mobile }}" id="mobile" name="mobile" placeholder="Enter your mobile number" required>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label> <br>
                <input type="radio" class="form-check-input" id="male" name="gender" value="male" {{ $data[0]->gender == 'male' ? 'checked' : '' }} required>
                <label for="male" class="form-label">Male</label> &nbsp;&nbsp;&nbsp;
                <input type="radio" class="form-check-input" id="female" name="gender" value="female" {{ $data[0]->gender == 'female' ? 'checked' : '' }} required>
                <label for="female" class="form-label">Female</label>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="0" {{ $data[0]->role == '0' ? 'selected' : '' }}>Admin</option>
                    <option value="1" {{ $data[0]->role == '1' ? 'selected' : '' }}>Staff</option>
                    <option value="2" {{ $data[0]->role == '2' ? 'selected' : '' }}>User</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" >
            </div>

            <input type="submit" class="btn btn-success" value="Submit" />
        </form>
    </div>
</div>

@endsection
