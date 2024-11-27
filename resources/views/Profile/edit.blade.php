<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <h1>Edit Profile</h1>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea id="bio" name="bio" class="form-control">{{ $profile->bio ?? '' }}</textarea>
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
    </form>
</div>
</body>
</html>