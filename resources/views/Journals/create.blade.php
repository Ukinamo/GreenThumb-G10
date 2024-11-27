<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
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
            <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="entry">Entry</label>
            <textarea name="entry" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="mood">Mood</label>
            <input type="text" name="mood" class="form-control">
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control">
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="form-group">
            <label for="visibility">Visibility</label>
            <select name="visibility" class="form-control">
                <option value="public">Public</option>
                <option value="private">Private</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Journal Entry</button>
        <a href="{{ route('journals.index') }}" class="btn btn-secondary">Go Back</a>
    </form>
</div>
</body>
</html>
