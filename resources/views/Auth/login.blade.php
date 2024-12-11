<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Open Sans", sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            min-height: 100vh;
            padding: 0 10px;
            background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: url('/images/green-plant-63.jpg') center center fixed, #000;
            background-position: center;
            background-size: cover;
            z-index: -1;
        }

        .container {
            width: 400px;
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(20px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.37);
            transition: all 0.3s ease;
        }

        .container:hover {
            box-shadow: 0 12px 48px rgba(0, 0, 0, 0.5);
        }

        h1 {
            font-size: 2.2rem;
            margin-bottom: 25px;
            color: #ffffff;
            letter-spacing: 1px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form label {
            text-align: left;
            margin-bottom: 5px;
            color: #ffffff;
            font-weight: bold;
        }

        form input {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid rgba(255, 255, 255, 0.4);
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            outline: none;
        }

        form input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        form input:focus {
            border-color: #ffffff;
        }

        button {
            background-color: #4CAF50;
            color: #ffffff;
            font-weight: 600;
            border: none;
            padding: 15px 20px;
            cursor: pointer;
            border-radius: 25px;
            font-size: 16px;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        button:hover {
            color: #000000;
            background: rgba(255, 255, 255, 0.2);
            border-color: #ffffff;
        }

        .container p {
            color: #ffffff;
        }

        .container p a {
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
        }

        .container p a:hover {
            text-decoration: underline;
        }

        .password-toggle {
            display: flex;
            align-items: center;
            justify-content: start;
            margin-bottom: 20px;
            position: relative;
        }

        .password-toggle label {
            margin-left: 5px;
            color: #ffffff;
            font-weight: bold;
        }

        .password-toggle input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .password-toggle label::before {
            content: "";
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 3px;
            background-color: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.4);
            margin-right: 5px;
            vertical-align: middle;
        }

        .password-toggle input[type="checkbox"]:checked + label::before {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        .password-toggle input[type="checkbox"]:checked + label::after {
            content: "";
            position: absolute;
            left: 10px;
            top: 10px;
            width: 10px;
            height: 6px;
            border-left: 2px solid #ffffff;
            border-bottom: 2px solid #ffffff;
            transform: rotate(-45deg);
        }
        .alert {
    border-radius: 10px;
    padding: 15px;
    margin-bottom: 20px;
    text-align: center;
    color: #ffffff;
    font-weight: bold;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    background-color: rgba(0, 0, 0, 0.4);
}

.alert-danger {
    background-color: rgba(255, 0, 0, 0.5);
    border-color: rgba(255, 0, 0, 0.8);
}

.alert-success {
    background-color: rgba(0, 128, 0, 0.5);
    border-color: rgba(0, 128, 0, 0.8);
}

.container .alert {
    margin-top: 15px;
}

    </style>
</head>
<body>

<div class="container">
<h1>Login</h1>
<!-- Display validation errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<!-- Display success message -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <div class="password-toggle">
                <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()">
                <label for="showPassword">Show Password</label>
            </div>

            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="{{ route('signup') }}">Register</a></p>
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>
</body>
</html>