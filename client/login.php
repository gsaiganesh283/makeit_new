<?php
session_start();

// Database connection (replace with your credentials)
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$dbname = "interview_platform";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to check credentials
    $sql = "SELECT * FROM clientusers WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Correct credentials
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['loggedin_time'] = time();  // Set login time
        header("Location: main-page.php"); // Redirect to dashboard or any other page
        exit();
    } else {
        $error_message = "Invalid username or password!";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css"> <!-- Linking to the external CSS file -->
</head>

<body>
    <div class="container">
        <form action="authenticate.php" method="POST">
            <h1>Login</h1>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>

            <!-- Link to registration page -->
            <p>
                Don't have an account? <a href="register.php" target="_blank">Register here</a>.
            </p>
        </form>
    </div>
</body>

</html>
