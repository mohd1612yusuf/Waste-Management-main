@extends('layout')

@section('content')
<div class="container mt-4 text-dark">

    {{-- Statistics --}}
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card border-dark">
                <div class="card-body">
                    <h5 class="card-title text-uppercase">Pending Garbages</h5>
                    <p class="display-6 fw-bold">{{ $pending }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-dark">
                <div class="card-body">
                    <h5 class="card-title text-uppercase">Picked Garbages</h5>
                    <p class="display-6 fw-bold">{{ $picked }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Assigned Staff Table --}}
    <h3 class="mt-4 border-bottom pb-2">Assigned Staff</h3>
    <table class="table table-bordered table-hover table-striped align-middle">
        <thead class="table-light">
            <tr class="text-center">
                <th>Name</th>
                <th>Email</th>
                <th>Assigned Sector</th>
                <th>Assign New Sector</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staffs as $staff)
                <tr class="text-center">
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->email }}</td>
                    <td><span class="fw-semibold">{{ optional($staff->staff)->sector ?? 'Not Assigned' }}</span></td>
                    <td>
                    <form action="{{ route('assign.sector', $staff->id) }}" method="POST">
    @csrf
    <!-- Dropdown for pending sectors -->
    <div class="mb-3">
        <label for="sector" class="form-label">Assign Sector</label>
        <select class="form-select" name="sector" id="sector" required>
            <option value="">Select Sector</option>
            @foreach ($pendingSectors as $sector)
                <option value="{{ $sector }}">{{ $sector }}</option>
            @endforeach
        </select>
    </div>
    
    <!-- Submit button -->
    <button type="submit" class="btn btn-dark">Assign Sector</button>
</form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Create New Staff Section --}}
    <h3 class="mt-5 border-bottom pb-2">Create New Staff</h3>
    <form action="{{ route('staff.create') }}" method="POST" class="p-4 border rounded bg-white shadow-sm">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" required class="form-control border-dark">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" name="email" id="email" required class="form-control border-dark">
        </div>

        <div class="mb-3">
            <label for="sector" class="form-label">Assign Sector <span class="text-danger">*</span></label>
            <select name="sector" id="sector" class="form-select border-dark" required>
                @foreach ($pendingSectors as $sector)
                    <option value="{{ $sector }}">{{ $sector }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-dark">Create Staff</button>
    </form>

</div>
@endsection
