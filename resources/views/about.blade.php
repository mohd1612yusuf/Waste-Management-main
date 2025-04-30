<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .about-section {
            background: linear-gradient(135deg, #f0f0f0, #ffffff);
            min-height: 100vh;
            padding: 60px 0;
            display: flex;
            align-items: center;
        }
        .about-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            padding: 40px;
            animation: fadeIn 1s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px);}
            to { opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body>


    <div class="about-section">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-10">
                    <div class="about-card">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <img src="https://lh6.googleusercontent.com/proxy/Csmg4D94b2NqaiwUy9Qcwj4HOKNi2rC5lSJF0mJbeAlp6NFs8AkLr42CBWf9vP_VJJztrelLC4GFzBYJsw3YDifCVMxy_5kvRYkAMVvLdkfQVtDM0urDhiMgveuz2GvI33FieSoVJpQ" class="img-fluid rounded-4 shadow-sm" alt="About Image">
                            </div>
                            <div class="col-md-6 mt-4 mt-md-0">
                                <h1 class="display-6 fw-light text-dark mb-3 mr-5">AT WASTE MANAGEMENT</h1>
                                <p class="lead text-muted">
                                    Our Waste Management System brings innovation to the way we handle and monitor waste disposal.
                                    We believe small steps lead to big environmental impacts.
                                </p>
                                <p class="text-muted">
                                    With a user-friendly portal for citizens, efficient tools for staff, and powerful monitoring for admins, 
                                    we are revolutionizing waste management sector by sector.
                                </p>
                                <a href="{{ route('signup') }}" class="btn btn-dark mt-4 px-4 py-2">
                                    <i class="bi bi-house-door-fill"></i> Signup
                                </a>
                                <a href="{{ route('login') }}" class="btn btn-dark mt-4 px-4 py-2">
                                    <i class="bi bi-house-door-fill"></i> Login
                                </a>
                            </div>
                        </div>

                        <hr class="my-5">

                        <div class="row text-center">
                            <div class="col-md-4 mb-4">
                                <i class="bi bi-globe2 display-4 text-success"></i>
                                <h5 class="fw-bold mt-3">Global Impact</h5>
                                <p class="text-muted">Aiming for a cleaner planet through smarter solutions.</p>
                            </div>
                            <div class="col-md-4 mb-4">
                                <i class="bi bi-lightning-charge-fill display-4 text-warning"></i>
                                <h5 class="fw-bold mt-3">Lightning Fast</h5>
                                <p class="text-muted">Swift reporting, faster cleanup, and happy citizens.</p>
                            </div>
                            <div class="col-md-4 mb-4">
                                <i class="bi bi-people-fill display-4 text-primary"></i>
                                <h5 class="fw-bold mt-3">People First</h5>
                                <p class="text-muted">Designed to serve and connect every community member.</p>
                            </div>
                        </div>

                    </div> <!-- about-card -->
                </div>
            </div>
        </div>
    </div>


</body>
</html>