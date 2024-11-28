<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Plants</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .plant-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .plant-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .plant-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .plant-card-body {
            padding: 15px;
        }

        .plant-card-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        .plant-card-text {
            color: #555;
            font-size: 1rem;
            margin-bottom: 15px;
        }

        .plant-card-actions a, .plant-card-actions button {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Your Plants</h2>
        <div class="card-container">
            @foreach ($plants as $plant)
                <div class="plant-card">
                    <img src="{{ $plant->image_url }}" alt="{{ $plant->name }}">
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
</body>
</html>
