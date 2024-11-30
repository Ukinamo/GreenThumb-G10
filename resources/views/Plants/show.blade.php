<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $plant->name }} - Plant Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f9f4; /* Softer background for a cleaner look */
            font-family: 'Arial', sans-serif;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin-top: 50px;
        }

        h1 {
            font-size: 2.8rem;
            color: #388e3c; /* Updated to a deeper green for the heading */
            margin-bottom: 30px;
            text-align: center;
            font-weight: 600;
        }

        .plant-card {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 30px;
            margin-bottom: 40px;
            border: 1px solid #e0f2f1; /* Adding a light border to match the theme */
        }

        .plant-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
            object-fit: cover; /* Ensures image stays within bounds */
        }

        .plant-card p {
            font-size: 1.2rem;
            line-height: 1.75;
            color: #555;
        }

        .plant-card .btn {
            border-radius: 8px;
            padding: 12px 25px;
            font-size: 1rem;
            margin-top: 20px;
        }

        .btn-secondary {
            background-color: #3498db; /* Keeping the blue but making it slightly more vibrant */
            color: white;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #2980b9; /* Darker hover effect */
        }

        .btn-back {
            background-color: #388e3c;
            border-radius: 8px;
            padding: 12px 20px;
            font-size: 1rem;
            text-decoration: none;
            color: white;
        }

        .btn-back:hover {
            background-color: #2c6e49; /* Darker green for hover */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .plant-card {
                padding: 20px;
            }

            .plant-card img {
                height: 250px; /* Fixed height for mobile */
            }
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
                <a href="{{ route('plants.index') }}" class="btn btn-back">Back to Plants</a>
            </div>
        </div>
    </div>
</body>
</html>
