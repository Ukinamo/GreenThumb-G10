<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ask a Question</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
            margin-top: 15px;
        }

        .form-control {
            border: 1px solid #81c784;
            border-radius: 8px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #4caf50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
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
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: block;
            margin: 20px auto 0;
            text-align: center;
        }

        .btn-secondary:hover {
            background-color: #43a047;
            text-decoration: none;
            transform: translateY(-2px);
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
    <h1>Ask a Question</h1>
    <form method="POST" action="{{ route('community.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Enter your question's title" value="{{ old('title') }}" required>
        </div>
        <div class="form-group">
            <label for="body">Question</label>
            <textarea id="body" name="body" class="form-control" rows="5" placeholder="Describe your question in detail" required>{{ old('body') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">Post Question</button>
    </form>
    <a href="{{ route('community.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Go Back</a>
</div>

</body>
</html>
