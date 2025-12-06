<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareNova - Welcome</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body style="background: linear-gradient(135deg, #e3f2fd, #bbdefb); height: 100vh;">

    <div class="container d-flex justify-content-center align-items-center" style="height: 100%;">
        <div class="text-center">
            
            <img src="https://cdn-icons-png.flaticon.com/512/2966/2966486.png" 
                 width="110" 
                 style="margin-bottom: 25px;">
            
            <h1 style="font-size: 45px; font-weight:700; color:#0d47a1;">
                Welcome to CareNova
            </h1>

            <p style="font-size: 18px; color: #424242; margin-top: 10px;">
                Your trusted healthcare companion
            </p>

            <div class="mt-5">
                <a href="{{ route('login') }}" 
                   class="btn btn-primary btn-lg mt-3"
                   style="width: 180px; height: 50px; font-size: 20px; font-weight:600; border-radius: 10px; background:#1565c0;">
                    Login
                </a>

                <a href="{{ route('register') }}" 
                   class="btn btn-secondary btn-lg ms-3 mt-3"
                   style="width: 180px; height: 50px; font-size: 20px; font-weight:600; border-radius: 10px; background:#78909c;">
                    Register
                </a>
            </div>

        </div>
    </div>

</body>
</html>
