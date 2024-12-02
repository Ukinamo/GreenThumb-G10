<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Gardening Tips</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General Styling */
        body {
            background-color: #f4f9f4;
            color: #2c6e49;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #388e3c;
            margin-bottom: 30px;
            font-size: 2.5rem;
        }

        h2 {
            color: #2c6e49;
            border-bottom: 2px solid #81c784;
            padding-bottom: 5px;
            margin-top: 40px;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }

        .btn {
            font-weight: bold;
            margin-right: 10px;
            padding: 10px 20px;
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #4caf50;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #388e3c;
        }

        .btn-dark {
            background-color: #2c6e49;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-dark:hover {
            background-color: #1b5e20;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
        }

        ul li {
            padding: 10px 15px;
            background-color: #e8f5e9;
            border: 1px solid #81c784;
            border-radius: 8px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        ul li strong {
            color: #388e3c;
        }

        ul li:hover {
            background-color: #c8e6c9;
            transition: background-color 0.3s ease;
        }

        .actions {
            text-align: center;
            margin-bottom: 30px;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            margin-top: 40px;
            background-color: #388e3c;
            color: #ffffff;
        }

        footer p {
            margin: 0;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <h1>Monthly Gardening Tips</h1>

    <div class="actions">
        <a href="{{ route('tips.create') }}" class="btn btn-primary">Add New Tip</a>
        <a href="{{ route('dashboard') }}" class="btn btn-dark">Back to Dashboard</a>
    </div>

    @foreach ($tips as $month => $monthlyTips)
        <h2>{{ $month }}</h2>  
        <ul>
            @foreach ($monthlyTips as $tip)
                <li>
                    <strong>{{ $tip->plant_type }}:</strong> {{ $tip->tip }}
                </li>
            @endforeach
        </ul>
    @endforeach

    <footer>
        <p>&copy; 2024 GreenThumb. All rights reserved.</p>
    </footer>
</body>
</html>
