<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        /* General Body Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5ff; /* Light violet background */
            color: #4b0082; /* Indigo text color */
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        /* Header Styling */
        header {
            background-color: #800080; /* Purple header */
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
            color: #800080; /* Purple for highlights */
            font-size: 1.5em;
            margin-top: 40px;
            text-align: center;
            text-transform: uppercase;
        }

        h6 {
            color: #4b0082; /* Indigo for subheaders */
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
            background-color: #4b0082; /* Indigo button */
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: fit-content;
        }

        .back-link:hover {
            background-color: #800080; /* Purple hover effect */
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
        <h1>About Us</h1>
    </header>
    <div class="content">
        <p>
            Project SKema is an advanced system designed specifically for the Sangguniang Kabataan (SK) 
            to centralize operations related to the profiling and secure storage of Katipunan ng Kabataan (KK) data. 
            This innovative platform addresses the inefficiencies faced by SKMF Victoria and similar organizations 
            by streamlining data management processes and enhancing overall operational effectiveness.
        </p>
        <p>
            By adopting Project SKema, SKMF Victoria ensures seamless data storage, improved analysis, 
            and more efficient data maintenance. This system significantly enhances decision-making processes 
            and strengthens governance, empowering SKMF Victoria to better serve the youth while maintaining 
            operational integrity.
        </p>

        <h5>Key Features of Project SKema</h5>

        <h6>Centralized Database System</h6>
        <p>
            <ul>
                <li><strong>Unified Data Repository:</strong> A secure location for all KK data, eliminating fragmentation.</li>
                <li><strong>User-Friendly Interface:</strong> Intuitive navigation ensures accessibility for all users.</li>
            </ul>
        </p>

        <h6>Secure Data Storage</h6>
        <p>
            <ul>
                <li><strong>Data Encryption:</strong> Protects sensitive information against unauthorized access.</li>
                <li><strong>Regular Backups:</strong> Automated backups prevent data loss and ensure continuity.</li>
            </ul>
        </p>

        <h6>Comprehensive Profiling Tools</h6>
        <p>
            <ul>
                <li><strong>Dynamic Member Profiles:</strong> Detailed profiles enable targeted program development.</li>
                <li><strong>Real-Time Updates:</strong> Keeps member data current for accurate decision-making.</li>
            </ul>
        </p>

        <h6>Enhanced Communication Features</h6>
        <p>
            <ul>
                <li><strong>Integrated Messaging System:</strong> Facilitates direct communication between SK officials and KK members.</li>
                <li><strong>Notification Alerts:</strong> Automated notifications ensure stakeholders are informed.</li>
            </ul>
        </p>
    </div>
    <a href="{{ route('dashboard') }}" class="back-link">Go Back</a>
</body>
</html>
