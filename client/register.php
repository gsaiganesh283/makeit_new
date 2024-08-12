<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Linking to the external CSS file -->
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #182037;
}

.container {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    padding: 40px;
    width: 300px;
    text-align: center;
}

h1 {
    margin-top: 0;
    font-size: 24px;
    color: #333;
}

label {
    display: block;
    margin: 15px 0 5px;
    font-weight: bold;
    text-align: left;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
    margin-top: 10px;
}

button:hover {
    background-color: #45a049;
}

p {
    margin-top: 20px;
    color: #666;
}

a {
    color: #4CAF50;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

</style>

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
