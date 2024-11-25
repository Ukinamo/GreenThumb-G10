<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $plant->name }} - Plant Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>{{ $plant->name }}</h1>
    <p><strong>Type:</strong> {{ $plant->type }}</p>
    <p><strong>Care Instructions:</strong> {{ $plant->care_instructions }}</p>
    @if($plant->image)
        <img src="{{ asset('storage/' . $plant->image) }}" alt="{{ $plant->name }}" class="img-fluid">
    @endif
    <a href="{{ route('plants.edit', $plant->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('plants.destroy', $plant->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('plants.index') }}" class="btn btn-secondary">Back to Plants</a>
</div>
</body>
</html>
