<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $plant->name }} - Edit Plant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9fafb;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin-top: 60px;
        }

        .card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }

        h2 {
            font-size: 2.5rem;
            color: #4CAF50; /* Green */
            margin-bottom: 35px;
            text-align: center;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-control {
            border-radius: 10px;
            padding: 15px;
            font-size: 1rem;
            background-color: #f1f3f5;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            border-color: #4CAF50; /* Green */
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.4);
        }

        .btn {
            border-radius: 8px;
            padding: 12px 20px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            text-transform: uppercase;
        }

        .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        .btn-primary:hover {
            background-color: #45a049;
            border-color: #45a049;
            box-shadow: 0 0 10px rgba(76, 175, 80, 0.3);
        }

        .btn-secondary {
            background-color: #3498db;
            border-color: #3498db;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.3);
        }

        .img-thumbnail {
            width: 180px;
            height: 180px;
            object-fit: cover;
            margin-top: 15px;
            border-radius: 10px;
        }

        .form-group label {
            font-weight: bold;
            color: #4CAF50; /* Green for labels */
            margin-bottom: 8px;
        }

        .d-flex {
            gap: 15px;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 150px;
        }

        .form-group input[type="file"] {
            padding: 12px;
            font-size: 1rem;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        .form-group input[type="file"]:focus {
            border-color: #4CAF50;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h2 {
                font-size: 2rem;
            }

            .btn {
                font-size: 1rem;
                padding: 12px 18px;
            }

            .img-thumbnail {
                width: 150px;
                height: 150px;
            }
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
