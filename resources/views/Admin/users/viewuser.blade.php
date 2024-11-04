@extends('Admin.layout')

@section('content')
<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <a href="{{ url('adduser') }}">  
            <button type="button" class="btn btn-outline-info btn-sm">Add User</button> 
        </a>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card h-100">
                    <img src="{{ asset('uploads/' . $data[0]->image) }}" 
                         class="card-img-top" 
                         alt="{{ $data[0]->name ?? 'Default Image' }}" 
                         style="height: auto; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $data[0]->name ?? 'User Name' }}</h5>
                        <p class="card-text"><strong>Email:</strong> {{ $data[0]->email ?? 'N/A' }}</p>
                        <p class="card-text"><strong>Mobile:</strong> {{ $data[0]->mobile ?? 'N/A' }}</p>
                        <p class="card-text"><strong>Gender:</strong> {{ $data[0]->gender ?? 'N/A' }}</p>
                        <p class="card-text"><strong>Role:</strong> {{ $data[0]->role ?? 'N/A' }}</p>
                    </div>
                 
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
