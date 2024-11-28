<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e8f5e9;
            color: #2e7d32;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            background-color: #43a047;
            border-bottom: 3px solid #1b5e20;
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
            padding: 20px;
            margin: 20px auto;
            background-color: #c8e6c9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .dashboard-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .dashboard-header h1 {
            font-size: 2.5rem;
            color: #2e7d32;
        }

        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            border-radius: 8px 8px 0 0;
            max-height: 180px;
            object-fit: cover;
        }

        .card-title {
            font-size: 1.2rem;
            color: #2e7d32;
        }

        .stats {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }

        .stat-item {
            text-align: center;
            padding: 10px;
            background-color: #a5d6a7;
            border-radius: 8px;
            color: #2e7d32;
            font-weight: bold;
        }

        footer {
            text-align: center;
            margin-top: 30px;
            color: #2e7d32;
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

    <!-- Dashboard Content -->
    <div class="container content">
        <div class="dashboard-header">
            <h1>Welcome to Your Plant Dashboard</h1>
            <p>Manage your plants, journals, and growth insights.</p>
        </div>

        <!-- Statistics Section -->
        <div class="stats">
            <div class="stat-item">
                <h2>10</h2>
                <p>Plants</p>
            </div>
            <div class="stat-item">
                <h2>5</h2>
                <p>Journals</p>
            </div>
            <div class="stat-item">
                <h2>3</h2>
                <p>New Insights</p>
            </div>
        </div>

        <!-- Plants Overview Section -->
        <h2 class="mb-4">Your Plants</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x180" class="card-img-top" alt="Plant Image">
                    <div class="card-body">
                        <h5 class="card-title">Fiddle Leaf Fig</h5>
                        <p class="card-text">Last watered: 3 days ago</p>
                        <a href="#" class="btn btn-success">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x180" class="card-img-top" alt="Plant Image">
                    <div class="card-body">
                        <h5 class="card-title">Monstera Deliciosa</h5>
                        <p class="card-text">Last watered: 1 week ago</p>
                        <a href="#" class="btn btn-success">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x180" class="card-img-top" alt="Plant Image">
                    <div class="card-body">
                        <h5 class="card-title">Snake Plant</h5>
                        <p class="card-text">Last watered: 5 days ago</p>
                        <a href="#" class="btn btn-success">View Details</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Journals Section -->
        <h2 class="mb-4">Your Journals</h2>
        <p><a href="{{ route('journals.index') }}" class="btn btn-outline-success">View Journals</a></p>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 GreenThumb. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
