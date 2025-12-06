<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body style="background: linear-gradient(135deg, #e3f2fd, #bbdefb); height: 100vh;">

    <div class="container d-flex justify-content-center align-items-center" style="height: 100%;">
        <div class="card shadow-lg p-4" style="width: 380px; border-radius: 15px; background: #ffffff;">
            
            <div class="text-center mb-4">
                <img src="https://cdn-icons-png.flaticon.com/512/2966/2966486.png" width="80" alt="Hospital Icon">
                <h2 style="font-weight: 700; color: #1565c0;">CareNova Login</h2>
                <p style="color: #6c757d;">Welcome back! Please login to continue.</p>
            </div>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
 {{session('success')}}
</div>
            @endif

<form action="{{ route('auth.login') }}" method="POST">
    @csrf
                @csrf

                <div class="mb-3">
                    <label style="font-weight: 600;">Email Address</label>
                    <input type="email" name="email" value="{{ old('mail') }}" class="form-control"
                           placeholder="Enter Email"
                           style="height: 45px; border-radius: 10px;">
                           @error('email')
                            <div class="text-danger mt-1" style="font-size: 14px;">{{ $message }}</div>
                               
                           @enderror
                </div>

                <div class="mb-3">
                    <label style="font-weight: 600;">Password</label>
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control"
                           placeholder="Enter Password"
                           style="height: 45px; border-radius: 10px;">
                             @error('password')
                            <div class="text-danger mt-1" style="font-size: 14px;">{{ $message }}</div>
                               
                           @enderror
                </div>

                <button class="btn w-100 mt-3" 
                        style="background:#1565c0; color:white; height:45px; border-radius:10px; font-size:18px; font-weight:600;">
                    Login
                </button>

                <div class="text-center mt-3">
                    <a href="#" style="color:#1565c0; text-decoration:none; font-weight:600;">
                        Forgot Password?
                    </a>
                </div>
            </form>

        </div>
    </div>

</body>
</html>
