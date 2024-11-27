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
    <h1>Journal Entry for {{ $journal->plant->name }}</h1>
    <p><strong>Title:</strong> {{ $journal->title }}</p>
    <p><strong>Entry:</strong> {{ $journal->entry }}</p>
    <p><strong>Mood:</strong> {{ $journal->mood }}</p>
    <p><strong>Location:</strong> {{ $journal->location }}</p>
    @if($journal->image)
        <img src="{{ asset('storage/' . $journal->image) }}" alt="Journal Image" class="img-fluid">
    @endif
    <a href="{{ route('journals.edit', $journal->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('journals.destroy', $journal->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('journals.index') }}" class="btn btn-secondary">Back to Journals</a>
</div>
</body>
</html>
