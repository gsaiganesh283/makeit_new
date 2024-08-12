<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css"> <!-- Linking to the external CSS file -->
</head>

<body>
    <div class="container">
        <form action="register_process.php" method="POST">
            <h1>Register</h1>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Register</button>

            <!-- Link to login page -->
            <p>
                Already have an account? <a href="login.php">Login here</a>.
            </p>
        </form>
    </div>
</body>

</html>
