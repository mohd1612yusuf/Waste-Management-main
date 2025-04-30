@extends('layout')
@section('content')
    <div class="container mt-5">
        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                Update Profile
            </div>

            <div class="card-body">
                <form action="{{ route('profile.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Important for update -->
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" class="form-control" value="{{ $user->name }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" id="email" class="form-control" value="{{ $user->email }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                    </div>


                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $user->address) }}">
                    </div>

                    <div class="mb-3">
                        <label for="sector" class="form-label">Sector</label>
                        <input type="text" name="sector" id="sector" class="form-control" value="{{ old('sector', $user->sector) }}">
                    </div>

                    <button type="submit" class="btn btn-danger">Update Profile</button>
                </form>
            </div>
        </div>
    </div>

@endsection
