<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        input:focus {
            border-color: black !important;
            box-shadow: 0 0 0 0.2rem rgba(0,0,0,0.25) !important;
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4" style="width: 100%; max-width: 500px;">
            <h2 class="text-center mb-4">Sign Up</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Create User Form --}}
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                
                <div class="form-group mb-3">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="address">Address:</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="sector">Sector:</label>
                    <input type="text" name="sector" class="form-control" value="{{ old('sector') }}">
                </div>
                
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-dark w-100">Create User</button>
                </div>

                <div class="text-center mt-3">
                    <small>Already have an account? 
                        <a href="{{ route('login') }}" class="text-decoration-none">Login here</a>
                    </small>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
