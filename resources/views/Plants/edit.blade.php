<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $plant->name }} - Edit Plant</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Plant</h2>

        <form action="{{ route('plants.update', $plant->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter plant name"
                       value="{{ old('name', $plant->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="type">Type</label>
                <input type="text" id="type" name="type" placeholder="Enter plant type"
                       value="{{ old('type', $plant->type) }}" required>
            </div>

            <div class="mb-3">
                <label for="image">Image</label>
                <input type="file" id="image" name="image">
                @if($plant->image)
                    <img src="{{ asset('storage/' . $plant->image) }}" alt="Current Image" width="100">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Plant</button>
            <a href="{{ route('plants.index') }}" class="btn btn-secondary">Back To Plant List</a>
        </form>
    </div>
</body>
</html>