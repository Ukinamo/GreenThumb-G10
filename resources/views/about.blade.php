<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Green Thumb</title>
    <style>
        /* General Body Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #e8f5e9; /* Light green background */
            color: #2e7d32; /* Dark green text color */
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        /* Header Styling */
        header {
            background-color: #43a047; /* Green header */
            color: white;
            text-align: center;
            padding: 2em 0;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 2.5em;
            margin: 0;
        }

        /* Content Wrapper */
        .content {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Paragraph Styling */
        p {
            text-align: justify;
            margin-bottom: 20px;
            font-size: 1.1em;
        }

        /* Section Headers */
        h5 {
            color: #43a047; /* Green for highlights */
            font-size: 1.5em;
            margin-top: 40px;
            text-align: center;
            text-transform: uppercase;
        }

        h6 {
            color: #2e7d32; /* Dark green for subheaders */
            font-size: 1.2em;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        /* Back Button Styling */
        .back-link {
            display: block;
            text-align: center;
            margin: 30px auto;
            padding: 10px 20px;
            font-size: 1em;
            text-decoration: none;
            color: white;
            background-color: #2e7d32; /* Dark green button */
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: fit-content;
        }

        .back-link:hover {
            background-color: #43a047; /* Lighter green hover effect */
        }

        /* Additional Styling for Key Features */
        ul {
            list-style-type: disc;
            padding-left: 20px;
            margin-top: 10px;
        }

        ul li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>About Green Thumb</h1>
    </header>
    <div class="content">
        <p>
            Green Thumb is a community-driven platform designed for gardening enthusiasts, offering tools and resources to nurture their passion for plants. Whether you're a seasoned gardener or just starting, Green Thumb empowers you to cultivate thriving greenery and share your journey with others.
        </p>
        <p>
            By connecting gardeners worldwide, Green Thumb fosters collaboration and learning, helping users grow both plants and their knowledge base. It is a one-stop destination for anyone who loves to see life bloom.
        </p>

        <h5>Key Features of Green Thumb</h5>

        <h6>Personalized Profiles</h6>
        <p>
            <ul>
                <li><strong>Gardener Identity:</strong> Create a profile to showcase your gardening skills and achievements.</li>
                <li><strong>Activity Dashboard:</strong> Track your contributions and gardening milestones.</li>
            </ul>
        </p>

        <h6>Plant Repository</h6>
        <p>
            <ul>
                <li><strong>Extensive Database:</strong> Access detailed information on a wide range of plants.</li>
                <li><strong>Care Guides:</strong> Learn about watering, sunlight, and soil requirements for each plant.</li>
            </ul>
        </p>

        <h6>Interactive Journals</h6>
        <p>
            <ul>
                <li><strong>Growth Tracking:</strong> Document your plants' progress with photos and notes.</li>
                <li><strong>Personal Insights:</strong> Reflect on successes and lessons learned over time.</li>
            </ul>
        </p>

        <h6>Community Q&A</h6>
        <p>
            <ul>
                <li><strong>Knowledge Sharing:</strong> Ask questions and exchange tips with fellow gardeners.</li>
                <li><strong>Expert Support:</strong> Receive guidance from experienced members of the community.</li>
            </ul>
        </p>

        <h6>Practical Gardening Tips</h6>
        <p>
            <ul>
                <li><strong>Quick Guides:</strong> Bite-sized advice to tackle common gardening challenges.</li>
                <li><strong>Seasonal Recommendations:</strong> Tips for planting and maintaining your garden year-round.</li>
            </ul>
        </p>
    </div>
    <a href="{{ route('dashboard') }}" class="back-link">Go Back</a>
</body>
</html>
