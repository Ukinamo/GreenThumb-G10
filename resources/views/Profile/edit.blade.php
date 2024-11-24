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
                <label for="website">Website</label>
                <input type="url" id="website" name="website" class="form-control" value="{{ $profile->website ?? '' }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
</body>
</html>