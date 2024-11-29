<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $plant->name }} - Plant Details</title>
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

        h1 {
            font-size: 2.5rem;
            color: #4CAF50;
            margin-bottom: 20px;
            text-align: center;
        }

        .plant-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 20px;
            margin-bottom: 30px;
        }

        .plant-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .plant-card p {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #555;
        }

        .plant-card .btn {
            border-radius: 5px;
            padding: 10px 20px;
        }

        .btn-secondary {
            background-color: #3498db;
            color: white;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="plant-card">
            <h1>{{ $plant->name }}</h1>

            <!-- Display plant image -->
            @if($plant->image)
                <img src="{{ asset($plant->image) }}" alt="{{ $plant->name }}">
            @else
                <img src="https://via.placeholder.com/800x400.png?text=No+Image+Available" alt="No Image Available">
            @endif

            <!-- Display plant details -->
            <p><strong>Type:</strong> {{ $plant->type }}</p>
            <p><strong>Care Instructions:</strong> {{ $plant->care_instructions }}</p>

            <!-- Back to plants button -->
            <div class="text-center">
                <a href="{{ route('plants.index') }}" class="btn btn-secondary">Back to Plants</a>
            </div>
        </div>
    </div>
</body>
</html>
