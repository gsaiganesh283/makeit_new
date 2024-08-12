<?php
// Database connection settings
$servername = "127.0.0.1:3306"; // Your database server
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "interview_platform"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$notification = ""; // Initialize notification variable

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_all'])) {
    // Get question data
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $example = $conn->real_escape_string($_POST['example']);

    // Insert question
    $sql_question = "INSERT INTO questions (title, description, example) VALUES ('$title', '$description', '$example')";

    if ($conn->query($sql_question) === TRUE) {
        // Get the last inserted question id
        $question_id = $conn->insert_id;

        // Get test case data
        $input1 = $conn->real_escape_string($_POST['input1']);
        $input2 = $conn->real_escape_string($_POST['input2']);
        $output1 = isset($_POST['output1']) ? $conn->real_escape_string($_POST['output1']) : '';
        $output2 = isset($_POST['output2']) ? $conn->real_escape_string($_POST['output2']) : '';

        // Insert test case associated with the question
        $sql_testcase = "INSERT INTO testcases (input1, input2, output1, output2) VALUES ('$input1', '$input2', '$output1','$output2')";

        if ($conn->query($sql_testcase) === TRUE) {
            $notification = "Question and test case added successfully!";
        } else {
            $notification = "Error adding test case: " . $conn->error;
        }
    } else {
        $notification = "Error adding question: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Question and Test Case</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-color: #182037;
    margin: 0;
    padding: 0;
}

.container-wrapper {
    display: flex;
    justify-content: space-between;
    gap: 20px; /* Space between containers */
    width: 100%;
    max-width: 1200px; /* Optional: Set a max-width for larger screens */
    padding: 20px; /* Padding around the containers */
    box-sizing: border-box;
}

.container {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    padding: 20px;
    flex: 1; /* Allow container to take up available space */
    min-width: 300px; /* Optional: Ensure containers don't get too small */
}

.container h2 {
    margin-top: 0;
    text-align: center;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-group textarea {
    resize: vertical;
    height: 80px;
}

.submit-btn {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

.submit-btn:hover {
    background-color: #45a049;
}

.notification {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 20px;
    text-align: center;
    display: none; /* Hide initially */
}

.error {
    background-color: #f44336;
    color: white;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 20px;
    text-align: center;
    display: none; /* Hide initially */
}

    </style>
</head>
<body>

<?php if ($notification): ?>
    <div class="notification" id="notification"><?php echo $notification; ?></div>
<?php endif; ?>

<div class="container-wrapper">
    <div class="container">
        <h2>Submit Question</h2>
        <form method="post" action="">
            <h3>Question Details</h3>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter the title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Enter the description" required></textarea>
            </div>
            <div class="form-group">
                <label for="example">Example</label>
                <textarea id="example" name="example" placeholder="Enter an example" required></textarea>
            </div>
            
            <h3>Test Case Details</h3>
            <div class="form-group">
                <label for="input1">Input 1</label>
                <input type="text" id="input1" name="input1" placeholder="Enter Input 1" required>
            </div>
            <div class="form-group">
                <label for="input2">Input 2</label>
                <input type="text" id="input2" name="input2" placeholder="Enter Input 2" required>
            </div>
            <div class="form-group">
                <label for="output1">Expected Output 1</label>
                <input type="text" id="output1" name="output1" placeholder="Enter Expected Output 1" required>
            </div>
            <div class="form-group">
                <label for="output2">Expected Output 2</label>
                <input type="text" id="output2" name="output2" placeholder="Enter Expected Output 2" required>
            </div>
            <button type="submit" name="submit_all" class="submit-btn">Submit All</button>
        </form>
    </div>
</div>

<script>
    // Show notification if it's set
    var notification = document.getElementById('notification');
    if (notification) {
        notification.style.display = 'block';
        setTimeout(function() {
            notification.style.display = 'none';
        }, 3000); // Hide after 3 seconds
    }
</script>

</body>
</html>
