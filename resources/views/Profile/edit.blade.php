<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e8f5e9; /* Light green background */
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

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            background-color: #ffffff;
            border-radius: 10px;
            border: 1px solid #81c784;
            color: #388e3c;
        }

        .form-control:focus {
            border-color: #43a047;
            box-shadow: 0 0 5px rgba(67, 160, 71, 0.5);
        }

        label {
            color: #388e3c;
            font-weight: bold;
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
    <h1>Edit Profile</h1>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea id="bio" name="bio" class="form-control" rows="4">{{ $profile->bio ?? '' }}</textarea>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" id="location" name="location" class="form-control" value="{{ $profile->location ?? '' }}">
        </div>

        <div class="form-group">
            <label for="hobbies">Hobbies</label>
            <input type="text" id="hobbies" name="hobbies" class="form-control" value="{{ $profile->hobbies ?? '' }}">
        </div>

        <div class="form-group">
            <label for="favorite_books">Favorite Books</label>
            <input type="text" id="favorite_books" name="favorite_books" class="form-control" value="{{ $profile->favorite_books ?? '' }}">
        </div>

        <div class="form-group">
            <label for="favorite_movies">Favorite Movies</label>
            <input type="text" id="favorite_movies" name="favorite_movies" class="form-control" value="{{ $profile->favorite_movies ?? '' }}">
        </div>

        <div class="form-group">
            <label for="favorite_music">Favorite Music</label>
            <input type="text" id="favorite_music" name="favorite_music" class="form-control" value="{{ $profile->favorite_music ?? '' }}">
        </div>

        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" id="country" name="country" class="form-control" value="{{ $profile->country ?? '' }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
        <a href="{{ route('profile.show') }}" class="btn btn-secondary">Go Back</a>
    </form>

    <div class="footer">
        <p>© 2024 GreenThumb. All rights reserved.</p>
    </div>
</div>

</body>
</html>
