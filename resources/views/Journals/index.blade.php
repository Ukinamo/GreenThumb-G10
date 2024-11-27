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
    <h1>Your Journals</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Plant</th>
                <th>Title</th>
                <th>Mood</th>
                <th>Location</th>
                <th>Entry</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($journals as $journal)
            <tr>
                <td>{{ $journal->plant->name }}</td>
                <td>{{ $journal->title }}</td>
                <td>{{ $journal->mood }}</td>
                <td>{{ $journal->location }}</td>
                <td>{{ Str::limit($journal->entry, 50) }}</td>
                <td>
                    <a href="{{ route('journals.show', $journal->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('journals.edit', $journal->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('journals.destroy', $journal->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('journals.create') }}" class="btn btn-primary">Add New Journal Entry</a>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Go Back</a>
</div>
</body>
</html>