<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Plants</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin-top: 50px;
        }

        h2 {
            text-align: center;
            font-size: 2.5rem;
            color: #4CAF50;
            margin-bottom: 30px;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .plant-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
            background-color: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #e0e0e0;
        }

        .plant-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .plant-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 2px solid #ddd;
        }

        .plant-card-body {
            padding: 20px;
            text-align: center;
        }

        .plant-card-title {
            font-size: 1.75rem;
            font-weight: bold;
            margin-bottom: 15px;
            color: #2c3e50;
        }

        .plant-card-text {
            color: #7f8c8d;
            font-size: 1rem;
            margin-bottom: 20px;
        }

        .plant-card-actions a, .plant-card-actions button {
            margin-right: 10px;
            padding: 8px 16px;
            border-radius: 5px;
        }

        .btn-info {
            background-color: #3498db;
            color: white;
            border: none;
        }

        .btn-info:hover {
            background-color: #2980b9;
        }

        .btn-warning {
            background-color: #f39c12;
            color: white;
            border: none;
        }

        .btn-warning:hover {
            background-color: #e67e22;
        }

        .btn-danger {
            background-color: #e74c3c;
            color: white;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        .mt-4 a {
            margin-right: 15px;
        }

        .footer {
            text-align: center;
            padding: 15px 0;
            background-color: #ecf0f1;
            margin-top: 40px;
        }

        .footer a {
            color: #34495e;
            text-decoration: none;
            font-weight: bold;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>My Green Sanctuary</h2>
        <div class="card-container">
            @foreach ($plants as $plant)
                <div class="plant-card">
                    <!-- Display plant image or placeholder -->
                    @if ($plant->image)
                        <img src="{{ asset($plant->image) }}" alt="{{ $plant->name }}">
                    @else
                        <img src="https://via.placeholder.com/300x200.png?text=No+Image" alt="No Image Available">
                    @endif
                    <div class="plant-card-body">
                        <h5 class="plant-card-title">{{ $plant->name }}</h5>
                        <div class="plant-card-actions">
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

        <div class="mt-4">
            <a href="{{ route('plants.create') }}" class="btn btn-primary">Add New Plant</a>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Go Back</a>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 GreenThumb. All Rights Reserved.</p>
    </div>
</body>
</html>
