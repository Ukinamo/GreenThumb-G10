<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f9f4;
            color: #2c6e49;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
        }

        .navbar {
            background-color: #388e3c;
            border-bottom: 4px solid #1b5e20;
        }

        .navbar .btn-dark {
            background-color: #2e7d32;
            border: none;
        }

        .navbar .btn-dark:hover {
            background-color: #1b5e20;
        }

        .dropdown-menu {
            max-height: 300px;
            overflow-y: auto;
            background-color: #a5d6a7;
            border: 1px solid #81c784;
        }

        .dropdown-item {
            color: #2e7d32;
        }

        .dropdown-item:hover {
            background-color: #81c784;
        }

        .btn-danger {
            background-color: #d32f2f;
            border: none;
        }

        .btn-danger:hover {
            background-color: #b71c1c;
        }

        .content {
            padding: 30px;
            margin: 30px auto;
            background-color: #e8f5e9;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
        }

        .dashboard-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .dashboard-header h1 {
            font-size: 2.8rem;
            color: #388e3c;
            font-weight: bold;
        }

        .dashboard-header p {
            font-size: 1.2rem;
            color: #2c6e49;
            line-height: 1.5;
            max-width: 800px;
            margin: 0 auto;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .card img {
            border-radius: 12px 12px 0 0;
            max-height: 220px;
            object-fit: cover;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.4rem;
            color: #2c6e49;
            font-weight: bold;
        }

        .card-text {
            color: #388e3c;
            font-size: 1rem;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            margin: 30px 0;
            gap: 20px;
        }

        .stat-item {
            text-align: center;
            padding: 15px;
            background-color: #a5d6a7;
            border-radius: 12px;
            color: #2c6e49;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, background-color 0.3s;
        }

        .stat-item:hover {
            transform: translateY(-5px);
            background-color: #81c784;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            color: #2c6e49;
        }

        footer p {
            font-size: 1rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .stats {
                flex-direction: column;
                align-items: center;
            }

            .stat-item {
                width: 100%;
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark">
        <div class="container-fluid d-flex justify-content-start">
            <div class="dropdown">
                <button class="btn btn-dark" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('plants.index') }}">Plants</a></li>
                    <li><a class="dropdown-item" href="{{ route('journals.index') }}">Journals</a></li>
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

    <div class="container content">
        <div class="dashboard-header">
            <h1>Welcome to GreenThumb</h1>
            <p>GreenThumb is a comprehensive system designed to help you manage your plants, track their growth, and keep detailed journals of your gardening journey. From tracking the health of your plants to keeping a record of your watering schedules and growth insights, GreenThumb makes it easy for you to stay connected with nature and cultivate a flourishing garden.</p>
        </div>

        <div class="stats">
            <div class="stat-item">
                <h2>{{ $plantsCount }}</h2>
                <p>Plants</p>
            </div>
            <div class="stat-item">
                <h2>{{ $journalsCount }}</h2>
                <p>Journals</p>
            </div>
        </div>

        <h2 class="mb-4">Your Plants</h2>
        <div class="row">
            @foreach($plants as $plant)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset($plant->image) }}" class="card-img-top" alt="{{ $plant->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $plant->name }}</h5>
                            <a href="{{ route('plants.show', $plant) }}" class="btn btn-success">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h2 class="mb-4">Your Journals</h2>
        <p><a href="{{ route('journals.index') }}" class="btn btn-outline-success">View Journals</a></p>
    </div>

    <footer>
        <p>&copy; 2024 GreenThumb. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
