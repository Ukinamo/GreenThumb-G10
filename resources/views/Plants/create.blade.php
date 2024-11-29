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
        }

        .container {
            max-width: 800px;
            margin-top: 60px;
        }

        .card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-top: 20px;
        }

        h1 {
            font-size: 2.2rem;
            color: #28a745;
            text-align: center;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 10px;
            padding: 15px;
            font-size: 1rem;
            background-color: #f1f3f5;
        }

        .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
        }

        .btn {
            border-radius: 5px;
            padding: 12px 20px;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-secondary {
            background-color: #007bff;
            border-color: #007bff;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-group input[type="file"] {
            padding: 10px;
        }

        .text-center {
            margin-top: 30px;
        }

        .text-center a {
            margin-left: 10px;
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
