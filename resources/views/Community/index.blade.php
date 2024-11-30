<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Questions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f9f4;
            color: #2c6e49;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
        }

        .navbar {
            background-color: #388e3c;
            border-bottom: 4px solid #1b5e20;
        }

        .content {
            padding: 30px;
            margin: 30px auto;
            background-color: #e8f5e9;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h1 {
            font-size: 2.8rem;
            color: #388e3c;
            font-weight: bold;
        }

        .header p {
            font-size: 1.2rem;
            color: #2c6e49;
        }

        .table {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
        }

        .table thead {
            background-color: #388e3c;
            color: #ffffff;
        }

        .table tbody tr:hover {
            background-color: #dcedc8;
        }

        .question-title a {
            color: #2c6e49;
            font-weight: bold;
            text-decoration: none;
            transition: color 0.3s;
        }

        .question-title a:hover {
            color: #1b5e20;
        }

        .btn-primary {
            background-color: #2e7d32;
            border: none;
        }

        .btn-primary:hover {
            background-color: #1b5e20;
        }

        .btn-secondary {
            background-color: #388e3c;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #2e7d32;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            color: #2c6e49;
        }

        footer p {
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark">
        <div class="container-fluid d-flex justify-content-start">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
        </div>
    </nav>

    <div class="container content">
        <div class="header">
            <h1>Community Questions</h1>
            <p>Discover what others are asking and join the discussion!</p>
        </div>

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('community.create') }}" class="btn btn-primary">Ask a Question</a>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Posted By</th>
                </tr>
            </thead>
            <tbody>
                @forelse($questions as $question)
                <tr>
                    <td class="question-title">
                        <a href="{{ route('community.show', $question->id) }}">{{ $question->title }}</a>
                    </td>
                    <td>{{ $question->user->name }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="2" class="text-center text-muted py-4">
                        No questions available. Be the first to ask!
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <footer>
        <p>&copy; 2024 GreenThumb. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
