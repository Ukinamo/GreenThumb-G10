<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Signup</h1>

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

        <!-- Signup form -->
        <form action="{{ route('signup') }}" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>

            <button type="submit">Signup</button>
        </form>

        <p class="mt-3">Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </div>
</body>
</html>
