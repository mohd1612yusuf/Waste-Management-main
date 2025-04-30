@extends('layout')

@section('content')
    <div class="card mb-4">
        <div class="card-header bg-grey text-dark">
            <h4 class="card-title text-center">Assigned Sector: <span class="text-dark">{{ $sector }}</span></h4>
        </div>
    </div>
    @foreach ($users as $user)
        <div class="card mb-4">
            
            <div class="card-body">
                <!-- User Details -->
                <h3>{{ $user->name }}</h3>
                <p><strong>Address:</strong> {{ $user->address }}</p>

                <!-- Display the table for the user's garbages -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Garbage Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through the user's garbages -->
                        @foreach ($user->garbages as $garbage)
                            @if ($garbage->status == 'pending')
                                <tr class="table-light"> <!-- Added Bootstrap warning class for styling -->
                                    <td>{{ $garbage->description }}</td>
                                    <td class="text-danger font-weight-bold">{{ $garbage->status }}</td> <!-- Highlight pending status -->
                                    <td>
                                        <!-- Change status to picked (Button) -->
                                        <form action="{{ route('garbage.update', $garbage) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-dark btn-sm">
                                                Change Status to Picked
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
@endsection

