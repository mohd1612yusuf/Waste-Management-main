@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Add Garbage Entry</h2>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
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

        <div class="mb-3">
            <label for="user_email" class="form-label">User Email</label>
            <input type="email" name="user_email" class="form-control" value="{{ old('user_email') }}" required>
        </div>

        <button type="submit" class="btn btn-dark">Add Garbage</button>
    </form>
</div>
@endsection
