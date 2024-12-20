<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Journal Entry</title>
    
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
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }

        h1 {
            font-size: 2.5rem;
            color: #4CAF50; /* Green */
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 10px;
            padding: 15px;
            font-size: 1rem;
            background-color: #f1f3f5;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
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
        }

        .btn-secondary {
            background-color: #3498db;
            border-color: #3498db;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }

        .form-group label {
            font-weight: bold;
            color: #388e3c;
            margin-bottom: 8px;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 150px;
        }

        .form-group input[type="file"] {
            padding: 10px;
            background-color: #f1f3f5;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        .form-group input[type="file"]:focus {
            border-color: #28a745;
        }

        select.form-control {
            background-color: #f1f3f5;
        }

        .text-center {
            margin-top: 30px;
        }

        .text-center a {
            margin-left: 15px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 2rem;
            }

            .btn {
                font-size: 1rem;
                padding: 12px 18px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h1>Add New Journal Entry</h1>
        <form method="POST" action="{{ route('journals.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">

            <div class="form-group">
                <label for="plant_id">Select Plant</label>
                <select name="plant_id" class="form-control" required>
                    @foreach($plants as $plant)
                        <option value="{{ $plant->id }}">{{ $plant->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter the title of your journal entry" required>
            </div>

            <div class="form-group">
                <label for="entry">Entry</label>
                <textarea name="entry" class="form-control" placeholder="Write your journal entry here" required></textarea>
            </div>

            <div class="form-group">
                <label for="mood">Mood</label>
                <input type="text" name="mood" class="form-control" placeholder="How do you feel?" required>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control" placeholder="Where are you?" required>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="visibility">Visibility</label>
                <select name="visibility" id="visibility" class="form-control" required>
                    <option value="private" {{ old('visibility', 'private') === 'private' ? 'selected' : '' }}>Private</option>
                    <option value="public" {{ old('visibility', 'private') === 'public' ? 'selected' : '' }}>Public</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Add Journal Entry</button>
                <a href="{{ route('journals.index') }}" class="btn btn-secondary">Go Back</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
