<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advocacy</title>

    <link rel="icon" type="image/png" href="{{ asset('vendors/images/fav-icon.png') }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
            padding: 20px;
        }

        .login-bg-img {
            max-width: 40%;
            margin-bottom: 20px;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-group .btn {
            margin: 5px;
            padding: 15px 30px;
            border-radius: 50px;
            background-color: #1b3e66;
            border: none;
            color: white;
            font-size: 16px;
            font-weight: bold; 
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
        }

        .btn-group .btn:hover {
            background-color: #132d4a;
            transform: translateY(-3px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.3);
        }

        .btn-group .btn:active {
            transform: translateY(1px);
        }

        
        @media (max-width: 768px) {
            .login-bg-img {
                max-width: 60%;
            }

            .btn-group .btn {
                width: 100%;
                border-radius: 25px;
                margin: 10px 0; 
                padding: 15px; 
                font-size: 18px; 
            }
        }

        @media (max-width: 576px) {
            .login-bg-img {
                max-width: 90%;
            }

            .btn-group .btn {
                border-radius: 25px !important; 
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <img src="{{ asset('vendors/images/login-bg.png') }}" alt="Advocacy Background" class="login-bg-img" id="banner-img" />
        <div class="btn-group" role="group" aria-label="Login buttons">
            <a class="btn" href="{{ route('advisor.home') }}">Advisor Login</a>
            <a class="btn" href="{{ route('admin.home') }}">Admin Login</a>
            <a class="btn" href="{{ route('student.home') }}">Student Login</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
