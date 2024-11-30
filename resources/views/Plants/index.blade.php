<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Plants</title>
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

        h2 {
            text-align: center;
            font-size: 2.5rem;
            color: #388e3c;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .container {
            max-width: 1200px;
            margin-top: 50px;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .plant-card {
            background-color: #e8f5e9;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #c8e6c9;
        }

        .plant-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .plant-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 2px solid #388e3c;
        }

        .plant-card-body {
            padding: 20px;
            text-align: center;
        }

        .plant-card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2c6e49;
            margin-bottom: 15px;
        }

        .btn {
            margin: 5px;
            padding: 8px 16px;
            border-radius: 5px;
        }

        .btn-info {
            background-color: #81c784;
            color: white;
            border: none;
        }

        .btn-info:hover {
            background-color: #4caf50;
        }

        .btn-warning {
            background-color: #fbc02d;
            color: white;
            border: none;
        }

        .btn-warning:hover {
            background-color: #f9a825;
        }

        .btn-danger {
            background-color: #e74c3c;
            color: white;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        .footer {
            text-align: center;
            padding: 15px 0;
            background-color: #ecf0f1;
            margin-top: 40px;
        }

        .footer p {
            font-size: 1rem;
            color: #2c6e49;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h2 {
                font-size: 2rem;
            }

            .btn {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark">
        <div class="container-fluid">
            <a href="{{ route('dashboard') }}" class="btn btn-dark">Back to Dashboard</a>
        </div>
    </nav>

    <div class="container">
        <h2>My Green Sanctuary</h2>
        <div class="card-container">
            @foreach ($plants as $plant)
                <div class="plant-card">
                    @if ($plant->image)
                        <img src="{{ asset($plant->image) }}" alt="{{ $plant->name }}">
                    @else
                        <img src="https://via.placeholder.com/300x200.png?text=No+Image" alt="No Image Available">
                    @endif
                    <div class="plant-card-body">
                        <h5 class="plant-card-title">{{ $plant->name }}</h5>
                        <div>
                            <a href="{{ route('plants.show', $plant->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('plants.edit', $plant->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('plants.destroy', $plant->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4 text-center">
            <a href="{{ route('plants.create') }}" class="btn btn-primary" style="background-color: #388e3c; border: none;">Add New Plant</a>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 GreenThumb. All Rights Reserved.</p>
    </div>
</body>
</html>
