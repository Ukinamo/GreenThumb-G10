<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $question->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f9f4;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #2c6e49;
        }

        .container {
            max-width: 800px;
            margin-top: 50px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2rem;
            color: #388e3c;
            margin-bottom: 20px;
        }

        p {
            font-size: 1rem;
            line-height: 1.6;
        }

        .card {
            border-radius: 8px;
            border: 1px solid #81c784;
            background-color: #f1f8f3;
        }

        .card-body {
            padding: 20px;
        }

        .card mb-2 {
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #388e3c;
            border: none;
            padding: 12px 20px;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #2e7d32;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: #66bb6a;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 8px;
            display: block;
            margin-top: 20px;
            text-align: center;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-secondary:hover {
            background-color: #43a047;
            text-decoration: none;
            transform: translateY(-2px);
        }

        h3 {
            color: #388e3c;
            margin-top: 30px;
        }

        h4 {
            color: #388e3c;
            margin-top: 40px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 1.8rem;
            }

            .btn-primary,
            .btn-secondary {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>{{ $question->title }}</h1>
    <p><strong>Posted By:</strong> {{ $question->user->name }}</p>
    <p>{{ $question->body }}</p>

    <h3>Answers</h3>
    @if($answers->isEmpty())
        <p>No answers yet. Be the first to answer!</p>
    @else
        @foreach($answers as $answer)
            <div class="card mb-3">
                <div class="card-body">
                    <p><strong>{{ $answer->user->name }}:</strong> {{ $answer->body }}</p>
                </div>
            </div>
        @endforeach
    @endif

    <h4>Post an Answer</h4>
    <form method="POST" action="{{ route('community.answer', $question->id) }}">
        @csrf
        <div class="form-group mb-3">
            <textarea name="body" class="form-control" rows="4" placeholder="Write your answer here..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">Submit Answer</button>
    </form>
    
    <a href="{{ route('community.index') }}" class="btn btn-secondary">Back to Community</a>
</div>

</body>
</html>
