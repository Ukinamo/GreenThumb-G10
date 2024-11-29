<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Journal Entry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f8e9; /* Light greenish background */
            color: #2e7d32; /* Dark green text */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            padding: 40px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin-top: 50px;
        }

        h1 {
            color: #2e7d32;
            font-size: 2.5rem;
            margin-bottom: 30px;
            text-align: center;
            border-bottom: 4px solid #81c784; /* Light green border for header */
            padding-bottom: 15px;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            font-weight: bold;
            padding: 15px;
            border-radius: 5px;
        }

        .form-control, .form-select {
            border-radius: 10px;
            border: 2px solid #81c784;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus, .form-select:focus {
            border-color: #388e3c;
            box-shadow: 0 0 5px rgba(56, 142, 60, 0.5);
        }

        .img-thumbnail {
            max-height: 200px;
            object-fit: cover;
            border: 2px solid #81c784;
        }

        .btn {
            border-radius: 30px;
            padding: 10px 25px;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #388e3c;
            border-color: #388e3c;
        }

        .btn-primary:hover {
            background-color: #45a049;
            border-color: #45a049;
        }

        .btn-secondary {
            background-color: #9e9e9e;
            border-color: #9e9e9e;
        }

        .btn-secondary:hover {
            background-color: #757575;
            border-color: #757575;
        }

        .form-group {
            margin-bottom: 20px;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            color: #2e7d32;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit Journal Entry for {{ $journal->plant->name }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('journals.update', $journal->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')

        <!-- Plant Select -->
        <div class="form-group">
            <label for="plant_id">Select Plant</label>
            <select name="plant_id" class="form-control" required>
                @foreach($plants as $plant)
                    <option value="{{ $plant->id }}" {{ $plant->id == $journal->plant_id ? 'selected' : '' }}>{{ $plant->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Title Input -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $journal->title) }}">
        </div>

        <!-- Entry Textarea -->
        <div class="mb-3">
            <label for="entry" class="form-label">Entry</label>
            <textarea name="entry" class="form-control" id="entry" rows="5">{{ old('entry', $journal->entry) }}</textarea>
        </div>

        <!-- Mood Input -->
        <div class="mb-3">
            <label for="mood" class="form-label">Mood</label>
            <input type="text" name="mood" class="form-control" id="mood" value="{{ old('mood', $journal->mood) }}">
        </div>

        <!-- Location Input -->
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" class="form-control" id="location" value="{{ old('location', $journal->location) }}">
        </div>

        <!-- Visibility Select -->
        <div class="mb-3">
            <label for="visibility" class="form-label">Visibility</label>
            <select name="visibility" id="visibility" class="form-control">
                <option value="private" {{ old('visibility', $journal->visibility) === 'private' ? 'selected' : '' }}>Private</option>
                <option value="public" {{ old('visibility', $journal->visibility) === 'public' ? 'selected' : '' }}>Public</option>
            </select>
        </div>

        <!-- Image Upload -->
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="image">
            @if ($journal->image)
                <p class="mt-2">Current Image:</p>
                <img src="{{ asset($journal->image) }}" alt="Journal Image" class="img-thumbnail">
            @endif
        </div>

        <!-- Action Buttons -->
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Update Journal Entry</button>
            <a href="{{ route('journals.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<footer>
    <p>&copy; 2024 GreenThumb. All rights reserved.</p>
</footer>

</body>
</html>
