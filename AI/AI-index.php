<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
        }

        /* Sidebar styles */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            position: fixed;
            height: 100%;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style-type: none;
        }

        .sidebar ul li {
            padding: 15px 10px;
            text-align: center;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
        }

        .sidebar ul li a:hover {
            background-color: #34495e;
            border-radius: 5px;
        }

        /* Main content styles */
        .main-content {
            margin-left: 250px; /* Same as sidebar width */
            padding: 20px;
            width: calc(100% - 250px);
        }

        .main-content h1 {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="AI-index.php" target="_blank">Home</a></li>
            <li><a href="add_questions.php" target="_blank">Add Question</a></li>
            <li><a href="view_questions.php" target="_blank">View Questions</a></li>
            <li><a href="settings.php" target="_blank">Settings</a></li>
            <li><a href="profile.php" target="_blank">Profile</a></li>
            <li><a href="logout.php" target="_blank">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
        <h1>Welcome to Your Dashboard</h1>
        <p>This is the main content area where you can manage your interview platform.</p>
        <!-- You can add more sections or content here -->
    </div>
</body>

</html>
