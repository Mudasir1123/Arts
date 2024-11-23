@extends('Admin.layout')

@section('content')
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <!-- User Details -->
            <h6 class="mb-4">Add User</h6>
            <form action="/save" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"
                        required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                        required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Enter Password here" required>
                </div>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter your number"
                        required>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label> <br> &nbsp;&nbsp;&nbsp;
                    <input type="radio" class="form-check-input" id="gender" name="gender" value="male" required>
                    <label for="male" class="form-label">Male</label> &nbsp;&nbsp;&nbsp;
                    <input type="radio" class="form-check-input" id="gender" name="gender" value="female" required>
                    <label for="female" class="form-label">Female</label>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="0">Admin</option>
                        <option value="1">User</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="file" required>
                </div>

                <input type="submit" class="btn btn-success" value="Submit" />
            </form>
        </div>
    </div>
@endsection
