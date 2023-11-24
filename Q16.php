<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "bhavani";
$dbname = "wtl";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rollNo = $_POST['rollNo'];
    $studName = $_POST['studName'];
    $studDept = $_POST['studDept'];
    $passingYear = $_POST['passingYear'];
    $classGrades = $_POST['classGrades'];

    // Insert data into the database
    $sql = "INSERT INTO students (rollNo, studName, studDept, passingYear, classGrades)
            VALUES ('$rollNo', '$studName', '$studDept', '$passingYear', '$classGrades')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='result'>
                <h3>Data Submitted Successfully</h3>
              </div>";
    } else {
        echo "<div class='result'>
                <h3>Error: " . $conn->error . "</h3>
              </div>";
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f8f8;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .result {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .result h3 {
            color: #4CAF50;
            text-align: center;
        }
    </style>
</head>
<body>

<form method="post" action="process_form.php">
    <h2>Student Information</h2>

    <label for="rollNo">Roll Number:</label>
    <input type="text" id="rollNo" name="rollNo" required>

    <label for="studName">Student Name:</label>
    <input type="text" id="studName" name="studName" required>

    <label for="studDept">Department:</label>
    <input type="text" id="studDept" name="studDept" required>

    <label for="passingYear">Passing Year:</label>
    <input type="text" id="passingYear" name="passingYear" required>

    <label for="classGrades">Class Grades:</label>
    <select id="classGrades" name="classGrades" required>
        <option value="First Class">First Class</option>
        <option value="Second Class">Second Class</option>
        <option value="Pass">Pass</option>
    </select>

    <button type="submit">Submit</button>
</form>

</body>
</html>
