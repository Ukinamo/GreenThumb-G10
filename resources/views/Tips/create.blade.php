<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Monthly Gardening Tip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f9f4;
            color: #2c6e49;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #388e3c;
            margin-bottom: 30px;
            font-size: 2.5rem;
        }

        .form-label {
            font-weight: bold;
            color: #2c6e49;
        }

        .form-select, .form-control {
            border-radius: 8px;
            padding: 12px;
            font-size: 1rem;
        }

        .form-select {
            background-color: #e8f5e9;
        }

        .form-control {
            background-color: #f1f3f5;
        }

        .btn {
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #4caf50;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #388e3c;
        }

        .mb-3 {
            margin-bottom: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        footer {
            text-align: center;
            margin-top: 40px;
            padding: 10px 0;
            background-color: #388e3c;
            color: #ffffff;
        }

        footer p {
            margin: 0;
            font-size: 1rem;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Add Monthly Gardening Tip</h1>
        <form action="{{ route('tips.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="month" class="form-label">Month</label>
                <select name="month" id="month" class="form-select" required>
                    <option value="" disabled selected>Choose a month</option>
                    @foreach ($months as $month)
                        <option value="{{ $month }}">{{ $month }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="plant_type" class="form-label">Plant Type</label>
                <select name="plant_type" id="plant_type" class="form-select" required>
                    <option value="" disabled selected>Choose a plant type</option>
                    @foreach ($plantTypes as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tip" class="form-label">Gardening Tip</label>
                <textarea name="tip" id="tip" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 GreenThumb. All rights reserved.</p>
    </footer>

</body>
</html>
