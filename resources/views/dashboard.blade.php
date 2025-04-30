@extends('layout')

@section('content')
<div class="container mt-5">
    <h1>Welcome, {{ $user->name }}</h1>

    {{-- Admin Section --}}
    @if(in_array('admin', $roles))
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h3>Admin Dashboard</h3>
            <p>Manage users, sectors, and view system stats.</p>
            <a href="{{ route('admin.index') }}" class="btn btn-danger">Manage System</a>
        </div>
    </div>
    @endif

    {{-- Staff Section --}}
    @if(in_array('staff', $roles))
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h3>Staff Dashboard</h3>
            <p>View assigned garbages and update status.</p>
            <a href="{{ route('staff.index') }}" class="btn btn-primary">View Tasks</a>
        </div>
    </div>
    @endif

    {{-- Normal User Section --}}
    @if(in_array('user', $roles))
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h3>User Dashboard</h3>
            <p>Request garbage pickup or view your requests.</p>
            <a href="{{ route('user.index') }}" class="btn btn-success">Request Pickup</a>
        </div>
    </div>
    @endif

</div>
@endsection



