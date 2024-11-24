<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .dropdown-toggle::after {
            display: none;
        }   

        .dropdown-menu {
            max-height: 300px;
            overflow-y: auto;
            background-color: #343a40;
        }

        .dropdown-item {
            color: #fff;
        }

        .dropdown-item:hover {
            background-color: #495057;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid d-flex justify-content-start">
            <div class="dropdown">
                <button class="btn btn-dark" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Help</a></li>
                    <li><a class="dropdown-item" href="#">Another Option</a></li>
                    <li><a class="dropdown-item" href="#">More Options</a></li>
                    <li><a class="dropdown-item" href="#">Extra Option</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100 mt-2">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
</nav>
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