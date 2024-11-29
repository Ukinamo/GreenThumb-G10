<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal Entries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Card Hover Animation */
        .journal-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
        }

        .journal-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            background-color: #f4f4f4;
        }

        /* Card Header Styling */
        .card-header {
            background-color: #388e3c;
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
        }

        /* Card Body Styling */
        .card-body {
            background-color: #fff;
            padding: 1.5rem;
            text-align: center;
        }

        /* Card Footer Styling */
        .card-footer {
            background-color: #f8f9fa;
            border-top: 2px solid #ddd;
            padding: 12px;
        }

        /* Card Title */
        .card-title {
            font-weight: bold;
            color: #388e3c;
            font-size: 1.25rem;
            margin-top: 10px;
        }

        /* Card Text */
        .card-text {
            font-size: 1rem;
            color: #555;
            margin-bottom: 15px;
        }

        /* Journal Image */
        .journal-image {
            max-width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Button Styling */
        .btn-info, .btn-warning, .btn-danger {
            transition: all 0.3s ease;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 600;
        }

        .btn-info:hover, .btn-warning:hover, .btn-danger:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        /* Add New Button Styling */
        .btn-primary {
            background-color: #388e3c;
            border-color: #388e3c;
            text-transform: uppercase;
            padding: 10px 25px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 30px;
            margin-top: 30px;
        }

        .btn-primary:hover {
            background-color: #45a049;
            border-color: #45a049;
        }

        /* Section Title */
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #388e3c;
            margin-bottom: 40px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Card Container */
        .card-deck {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: space-around;
        }

        /* Center Align Buttons */
        .text-center a {
            margin: 10px;
        }

        /* Page Background */
        body {
            background-color: #f0f4f1;
            font-family: 'Arial', sans-serif;
        }

        /* Container Styling */
        .container {
            max-width: 1200px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="section-title">Journal Entries</h1>

    <div class="card-deck">
        @foreach($journals as $journal)
        <div class="col-md-4 mb-4">
            <div class="card journal-card shadow-lg">
                <div class="card-header">
                    Journal Entry for {{ $journal->plant->name }}
                </div>
                <div class="card-body">
                    @if($journal->image)
                    <img src="{{ asset($journal->image) }}" alt="Journal Image" class="journal-image">
                    @endif
                    <h5 class="card-title">{{ $journal->title }}</h5>
                    <p class="card-text">{{ Str::limit($journal->entry, 100) }}</p>
                </div>
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
        </div>
        @endforeach
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('journals.create') }}" class="btn btn-primary">Add New Journal Entry</a>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Go Back</a>
    </div>
</div>

</body>
</html>
