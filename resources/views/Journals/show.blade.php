<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal Entry</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f8e9; /* Light greenish background */
            color: #2e7d32; /* Dark green text */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            max-width: 900px; /* Limit the width for a cleaner layout */
        }

        .journal-entry p {
            font-size: 1.2rem;
            color: #388e3c;
        }

        .journal-entry strong {
            font-weight: bold;
            color: #2e7d32;
        }

        .journal-image {
            width: 100%;
            max-height: 400px;
            object-fit: contain;
            border: 2px solid #81c784; /* Light green border for images */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow around the image */
        }

        .journal-image-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn-secondary {
            background-color: #2e7d32;
            border: none;
            padding: 10px 20px;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-top: 30px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary:hover {
            background-color: #388e3c;
        }

        .journal-container h1 {
            text-align: center;
            color: #2e7d32;
            font-size: 2.5rem;
            margin-bottom: 30px;
            border-bottom: 4px solid #81c784; /* Border added to header */
            padding-bottom: 15px;
        }

        .footer {
            text-align: center;
            color: #2e7d32;
            margin-top: 40px;
            padding: 20px;
            background-color: #ffffff;
            border-top: 2px solid #81c784;
        }
    </style>
</head>
<body>
<div class="container journal-container">
    <h1>Journal Entry for {{ $journal->plant->name }}</h1>

    <!-- Image Section -->
    @if($journal->image)
        <div class="journal-image-container">
            <img src="{{ asset($journal->image) }}" alt="Journal Image" class="journal-image">
        </div>
    @else
        <p class="text-center">No image available for this journal entry.</p>
    @endif

    <!-- Journal Details -->
    <div class="journal-entry mt-4">
        <p><strong>Title:</strong> {{ $journal->title }}</p>
        <p><strong>Entry:</strong> {{ $journal->entry }}</p>
        <p><strong>Mood:</strong> {{ $journal->mood }}</p>
        <p><strong>Location:</strong> {{ $journal->location }}</p>
    </div>

    <!-- Button to Return to Journals -->
    <a href="{{ route('journals.index') }}" class="btn btn-secondary">Back to Journals</a>
</div>

<footer class="footer">
    <p>&copy; 2024 GreenThumb. All rights reserved.</p>
</footer>

</body>
</html>
