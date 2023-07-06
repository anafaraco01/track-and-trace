<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Track and Trace</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        /* Your existing styles go here */

        /* Additional styles for image and buttons */
        html, body {
            height: 100%;
            /*display: flex;*/
            align-items: center;
            justify-content: center;
            background-image: url({{ asset('images/trackandtracebackground.png') }});
            background-repeat: no-repeat;
            background-size: cover;
        }

        .image-container {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-register-buttons {
            text-align: center;
        }

        .login-button,
        .register-button {
            margin: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            background-color: #3490dc;
            color: white;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-button:hover,
        .register-button:hover {
            background-color: #2779bd;
        }
    </style>
</head>
<body>
<div class="image-container">
    <img src="{{ asset('images/zeelandrefinerytrans.png') }}" alt="Image Description" width="500" height="70">
</div>
<div class="login-register-buttons">
    <a href="{{ route('login') }}" class="login-button">Login</a>
    <a href="{{ route('register') }}" class="register-button">Register</a>
</div>
</body>
</html>
