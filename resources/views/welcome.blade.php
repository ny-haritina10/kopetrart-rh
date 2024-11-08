<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            height: 100vh;
            background-color: #f9f9f9;
        }
        /* Sidebar styling */
        .sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }
        .sidebar h2 {
            font-size: 1.5em;
            margin-top: 0;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            display: block;
            background: #444;
        }
        .sidebar a:hover {
            background: #555;
        }
        /* Main content area */
        .content {
            flex-grow: 1;
            padding: 20px;
        }
        .header {
            border-bottom: 2px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Navigation</h2>
        <!-- Add link to Talent Needs -->
        <a href="{{ route('talent_needs.index') }}">Talent Needs</a>
        
        <a href="{{ route('departments.index') }}">Departments</a>
    </div>

    <div class="content">
        <div class="header">
            <h1>Welcome to the Dashboard</h1>
        </div>
        <p>This is your welcome page. Use the sidebar to navigate to different sections.</p>
    </div>
</body>
</html>