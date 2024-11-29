<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $plant->name }} - Edit Plant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 800px;
            margin-top: 50px;
        }

        .card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        h2 {
            font-size: 2rem;
            color: #4CAF50;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 10px;
            padding: 15px;
            font-size: 1rem;
        }

        .btn {
            border-radius: 5px;
            padding: 12px 20px;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        .btn-primary:hover {
            background-color: #45a049;
            border-color: #45a049;
        }

        .btn-secondary {
            background-color: #3498db;
            border-color: #3498db;
        }

        .btn-secondary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }

        .img-thumbnail {
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-top: 10px;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .d-flex {
            gap: 10px;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2>Edit Plant</h2>

        <form action="{{ route('plants.update', $plant->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $plant->name }}" required>
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" name="type" class="form-control" value="{{ $plant->type }}" required>
            </div>

            <div class="form-group">
                <label for="care_instructions">Care Instructions</label>
                <textarea name="care_instructions" class="form-control" required>{{ $plant->care_instructions }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Change Image</label>
                <input type="file" name="image" class="form-control" id="image">
                @if ($plant->image)
                    <p class="mt-2">Current Image:</p>
                    <img src="{{ asset($plant->image) }}" alt="Plant Image" class="img-thumbnail">
                @endif
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Update Plant</button>
                <a href="{{ route('plants.index') }}" class="btn btn-secondary">Back To Plant List</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
