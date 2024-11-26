<!-- resources/views/plants/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Plants</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Your Plants</h2>
        <table class="table table-striped table-bordered mt-5">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plants as $plant)
                    <tr>
                        <td>{{ $plant->name }}</td>
                        <td>{{ $plant->type }}</td>
                        <td>
                            <a href="{{ route('plants.show', $plant->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('plants.edit', $plant->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('plants.destroy', $plant->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('plants.create') }}" class="btn btn-primary">Add New Plant</a>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Go Back</a>
    </div>
</body>
</html>