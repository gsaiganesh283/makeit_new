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

// Fetch questions
$sql = "SELECT * FROM questions";
$result = $conn->query($sql);

// Fetch test cases associated with each question
$testcases = [];
if ($result->num_rows > 0) {
    $question_ids = [];
    while ($row = $result->fetch_assoc()) {
        $question_ids[] = $row['id'];
    }

    if (!empty($question_ids)) {
        $question_ids_str = implode(',', $question_ids);
        $sql_testcases = "SELECT * FROM testcases WHERE id IN ($question_ids_str)";
        $result_testcases = $conn->query($sql_testcases);
        while ($testcase = $result_testcases->fetch_assoc()) {
            $testcases[$testcase['id']][] = $testcase;
        }
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
    <title>View Questions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #182037;
            margin: 0;
        }
        .container-wrapper {
            display: flex;
            flex-direction: column;
            width: 800px;
            margin: 20px;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            width: 100%;
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
        .form-group p {
            margin: 0;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f9f9f9;
        }
        .testcase-group {
            margin-top: 10px;
            padding: 10px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }
        .testcase-group p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container-wrapper">
    <?php if ($result->num_rows > 0): ?>
        <?php foreach ($result as $row): ?>
            <div class="container">
                <h2>Question</h2>
                <div class="form-group">
                    <label for="title">Title</label>
                    <p id="title"><?php echo $row['title']; ?></p>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <p id="description"><?php echo $row['description']; ?></p>
                </div>
                <div class="form-group">
                    <label for="example">Example</label>
                    <p id="example"><?php echo $row['example']; ?></p>
                </div>

                <div class="testcase-group">
                    <h3>Test Cases</h3>
                    <?php if (isset($testcases[$row['id']])): ?>
                        <?php foreach ($testcases[$row['id']] as $testcase): ?>
                            <div class="form-group">
                                <label for="input1">Input 1</label>
                                <p id="input1"><?php echo $testcase['input1']; ?></p>
                            </div>
                            <div class="form-group">
                                <label for="input2">Input 2</label>
                                <p id="input2"><?php echo $testcase['input2']; ?></p>
                            </div>
                            <div class="form-group">
                                <label for="output1">Expected Output 1</label>
                                <p id="output1"><?php echo $testcase['output1']; ?></p>
                            </div>
                            <div class="form-group">
                                <label for="output2">Expected Output 2</label>
                                <p id="output2"><?php echo $testcase['output2']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No test cases available for this question.</p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No questions found.</p>
    <?php endif; ?>
</div>

</body>
</html>
