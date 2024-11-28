<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e8f5e9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 800px;
            padding: 40px;
        }

        h1 {
            font-size: 2.5rem;
            color: #2e7d32;
            text-align: center;
            margin-bottom: 40px;
        }

        .profile-card {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .profile-card h3 {
            font-size: 1.8rem;
            color: #388e3c;
            margin-bottom: 20px;
        }

        .profile-card p {
            font-size: 1.1rem;
            color: #388e3c;
            margin-bottom: 10px;
        }

        .btn {
            border-radius: 25px;
            padding: 12px 20px;
            font-weight: bold;
            font-size: 1rem;
            margin-top: 20px;
        }

        .btn-primary {
            background-color: #43a047;
            border: none;
        }

        .btn-primary:hover {
            background-color: #388e3c;
        }

        .btn-secondary {
            background-color: #81c784;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #66bb6a;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            color: #388e3c;
        }

        .footer a {
            color: #388e3c;
            font-weight: bold;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Your Profile</h1>

    <div class="profile-card">
        <h3>Personal Information</h3>
        <p><strong>Bio:</strong> {{ $profile->bio ?? 'No bio available' }}</p>
        <p><strong>Location:</strong> {{ $profile->location ?? 'No location available' }}</p>
        <p><strong>Country:</strong> {{ $profile->country ?? 'No country available' }}</p>
    </div>

    <div class="profile-card">
        <h3>Favorites</h3>
        <p><strong>Hobbies:</strong> {{ $profile->hobbies ?? 'No hobbies available' }}</p>
        <p><strong>Favorite Books:</strong> {{ $profile->favorite_books ?? 'No favorite books available' }}</p>
        <p><strong>Favorite Movies:</strong> {{ $profile->favorite_movies ?? 'No favorite movies available' }}</p>
        <p><strong>Favorite Music:</strong> {{ $profile->favorite_music ?? 'No favorite music available' }}</p>
    </div>

    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Go Back</a>

    <div class="footer">
        <p>© 2024 GreenThumb. All rights reserved.</p>
    </div>
</div>

</body>
</html>
