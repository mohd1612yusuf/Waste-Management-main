@extends('layout')

@section('content')
<div class="container mt-4 mb-4">
    <div class="card mb-1">
        <div class="card-header bg-grey text-dark">
            <h4 class="card-title text-center">Add Garbage Entry</span></h4>
        </div>
    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @php
        $types = ['organic', 'plastic', 'metal', 'glass', 'paper'];
    @endphp
    {{-- Garbage Form --}}
    <form action="{{ route('garbage.store') }}" method="POST" class="border border-dark p-4 rounded shadow">
        @csrf

        <div class="mb-3">
            <label for="type" class="form-label">Garbage Type</label>
            <select name="type" class="form-control" required>
                <option value="">-- Select Type --</option>
                @foreach ($types as $type)
                    <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Description (optional)</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-dark">Add Garbage</button>
    </form>
</div>

    <div class="card mb-4">
        <div class="card-header bg-grey text-dark">
            <h4 class="card-title text-center">History</span></h4>
        </div>
    </div>
        @if($history->isEmpty())
            <div class="alert alert-info">
                No garbage records found!
            </div>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($history as $garbage)
                        <tr>
                            <td>{{ $garbage->description }}</td>
                            <td>
                                <span class="badge bg-{{ $garbage->status == 'pending' ? 'warning' : 'success' }}">
                                    {{ ucfirst($garbage->status) }}
                                </span>
                            </td>
                            <td>{{ $garbage->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
@endsection

