<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body style="background: linear-gradient(135deg, #e3f2fd, #bbdefb); height: 100vh;">

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh; padding-top:40px;">
        <div class="card shadow-lg p-4" style="width: 400px; border-radius: 15px; background: #ffffff;">
            
            <div class="text-center mb-3">
                <img src="https://cdn-icons-png.flaticon.com/512/2966/2966486.png" width="80" alt="Hospital Icon">
                <h2 style="font-weight: 700; color: #1565c0;">Register at CareNova</h2>
                <p style="color: #6c757d;">Create an account to access hospital services</p>
            </div>

            <form action="{{route('auth.register')}}" method="POST">
                @csrf

                <div class="mb-3">
                    <label style="font-weight: 600;">Full Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                           placeholder="Enter Full Name"
                           style="height: 45px; border-radius: 10px;">
                           @error('name')
                            <div class="text-danger mt-1" style="font-size: 14px;">{{ $message }}</div>
                               @enderror
                </div>

                <div class="mb-3">
                    <label style="font-weight: 600;">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                           placeholder="Enter Email"
                           style="height: 45px; border-radius: 10px;">
                           @error('email')
                            <div class="text-danger mt-1" style="font-size: 14px;">{{ $message }}</div>
                               @enderror
                </div>

                <div class="mb-3">
                    <label style="font-weight: 600;">Password</label>
                    <input type="password" name="password" value="{{old('password')}}" class="form-control"
                           placeholder="Enter Password"
                           style="height: 45px; border-radius: 10px;">
                             @error('password')
                            <div class="text-danger mt-1" style="font-size: 14px;">{{ $message }}</div>
                               @enderror
                </div>

                <div class="mb-3">
                    <label style="font-weight: 600;">Confirm Password</label>
                    <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control"
                           placeholder="Confirm Password"
                           style="height: 45px; border-radius: 10px;">
                            @error('password_confirmation')
                            <div class="text-danger mt-1" style="font-size: 14px;">{{ $message }}</div>
                               @enderror
                </div>

                <button class="btn w-100 mt-3" 
                        style="background:#1565c0; color:white; height:45px; border-radius:10px; font-size:18px; font-weight:600;">
                    Register
                </button>

                <div class="text-center mt-3">
                    <p style="margin: 0;">Already have an account?</p>
                    <a href="{{ route('login') }}"
                       style="color:#1565c0; text-decoration:none; font-weight:600; font-size:16px;">
                        Login Here
                    </a>
                </div>
            </form>

        </div>
    </div>

</body>
</html>
