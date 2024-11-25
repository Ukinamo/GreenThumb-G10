<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
        <h1>Your Profile</h1>
        <p><strong>Bio:</strong> {{ $profile->bio ?? 'No bio available' }}</p>
        <p><strong>Location:</strong> {{ $profile->location ?? 'No location available' }}</p>
        <p><strong>Website:</strong> <a href="{{ $profile->website ?? '#' }}">{{ $profile->website ?? 'No website available' }}</a></p>
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Go Back</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>