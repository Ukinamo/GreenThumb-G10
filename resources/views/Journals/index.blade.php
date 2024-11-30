<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal Entries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f1;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #388e3c;
            margin-bottom: 30px;
            text-align: center;
            text-transform: uppercase;
        }

        .journal-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            background-color: #ffffff;
        }

        .journal-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #388e3c;
            color: white;
            font-size: 1.25rem;
            font-weight: 700;
            text-align: center;
            padding: 10px 15px;
        }

        .card-body {
            padding: 20px;
            text-align: center;
        }

        .card-title {
            font-weight: bold;
            color: #388e3c;
            font-size: 1.2rem;
            margin-top: 10px;
        }

        .card-subtitle {
            color: #666;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .card-text {
            font-size: 1rem;
            color: #555;
            margin: 15px 0;
        }

        .journal-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        /* Buttons */
        .btn-info, .btn-warning, .btn-danger {
            font-weight: bold;
            border-radius: 30px;
            padding: 8px 16px;
            transition: transform 0.3s ease;
        }

        .btn-info:hover, .btn-warning:hover, .btn-danger:hover {
            transform: scale(1.1);
        }

        .btn-primary {
            background-color: #388e3c;
            border-color: #388e3c;
            font-weight: bold;
            padding: 12px 24px;
            font-size: 1.1rem;
            text-transform: uppercase;
            border-radius: 30px;
        }

        .btn-primary:hover {
            background-color: #45a049;
            border-color: #45a049;
        }

        .btn-secondary {
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 30px;
        }

        .card-deck {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .text-center {
            margin-top: 40px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="section-title">Journal Entries</h1>

    <div class="card-deck">
        @foreach($journals as $journal)
        <div class="card journal-card shadow-sm">
            <div class="card-header">
                Journal for {{ $journal->plant->name }}
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <!-- Journal Image -->
                @if($journal->image)
                <img src="{{ asset($journal->image) }}" alt="Image of {{ $journal->plant->name }}" class="journal-image">
                @endif

                <!-- Journal Title and Author -->
                <h5 class="card-title">{{ $journal->title }}</h5>
                <h6 class="card-subtitle">by {{ $journal->user->name }}</h6>

                <!-- Journal Entry Preview -->
                <p class="card-text">{{ Str::limit($journal->entry, 100, '...') }}</p>
            </div>

            <!-- Card Footer with Actions -->
            <div class="card-footer text-center">
                <a href="{{ route('journals.show', $journal->id) }}" class="btn btn-info btn-sm">View</a>
                @if($journal->user_id === Auth::id())
                <a href="{{ route('journals.edit', $journal->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('journals.destroy', $journal->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <!-- Action Buttons -->
    <div class="text-center">
        <a href="{{ route('journals.create') }}" class="btn btn-primary">Add New Journal Entry</a>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Go Back</a>
    </div>
</div>
</body>
</html>
