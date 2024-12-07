<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Plant</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9fafb;
            font-family: 'Arial', sans-serif;
            color: #388e3c;
        }

        .container {
            max-width: 800px;
            margin-top: 60px;
        }

        .card {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-top: 20px;
        }

        h1 {
            font-size: 2.4rem;
            color: #388e3c;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-control {
            border-radius: 12px;
            padding: 15px;
            font-size: 1rem;
            background-color: #f1f3f5;
            border: 1px solid #ccc;
            color: #388e3c; /* Ensure consistent text color for all inputs */
        }

        .form-control:focus {
            border-color: #388e3c;
            box-shadow: 0 0 8px rgba(56, 142, 60, 0.5);
        }

        .btn {
            border-radius: 8px;
            padding: 14px 20px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            text-transform: uppercase;
            color: white;
        }

        .btn-primary {
            background-color: #388e3c; /* Primary green */
            border-color: #388e3c;
        }

        .btn-primary:hover {
            background-color: #2c6e49;
            border-color: #2c6e49;
            box-shadow: 0 0 10px rgba(56, 142, 60, 0.3);
        }

        .btn-secondary {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #0056b3;
            border-color: #004085;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
        }

        .form-group label {
            font-weight: bold;
            color: #388e3c;
            margin-bottom: 8px;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 140px;
        }

        .form-group input[type="file"] {
            padding: 12px;
            font-size: 1rem;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }

        .form-group input[type="file"]:focus {
            border-color: #388e3c;
        }

        .text-center {
            margin-top: 30px;
        }

        .text-center a {
            margin-left: 20px;
            text-decoration: none;
            color: #ffffff;
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 1.8rem;
            }

            .btn {
                font-size: 1rem;
                padding: 12px 18px;
            }

            .form-control {
                padding: 12px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h1>Add New Plant</h1>
        <form method="POST" action="{{ route('plants.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Plant Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter the plant's name" required>
            </div>
            <div class="form-group">
                <label for="type">Plant Type</label>
                <input type="text" name="type" class="form-control" placeholder="Enter the plant's type" required>
            </div>
            <div class="form-group">
                <label for="care_instructions">Care Instructions</label>
                <textarea name="care_instructions" class="form-control" placeholder="Describe how to care for the plant" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Plant Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Add Plant</button>
                <a href="{{ route('plants.index') }}" class="btn btn-secondary">Back To Plant List</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
