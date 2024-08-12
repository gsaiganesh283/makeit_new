<?php
// require_once 'session_check.php';  // Include the session check
?>

<?php
session_start(); // Start a session

// Database configuration
$servername = "127.0.0.1:3306";
$username = "root";  // Replace with your database username
$password = "";  // Replace with your database password
$dbname = "interview_platform";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    // Query the database for the user
    $sql = "SELECT * FROM aiusers WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, start a session
            $_SESSION['username'] = $username;
            header("Location: AI-index.php"); // Redirect to the dashboard
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }
}

// Close the connection
$conn->close();
?>
