
<?php 
// Create connection
$conn = new mysqli('localhost', 'root','','endsem');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$studentID = $_POST['studentID'];
$studentName = $_POST['studentName'];
$emailID = $_POST['emailID'];
$grade12th = $_POST['12thGrade']; // Rename variable to match the column name in the database
$JEEScore = $_POST['JEEScore'];
$Department = $_POST['Department'];

// Insert data into the database
$sqlInsert = "INSERT INTO student19 (studentID, studentName, emailID, 12thGrade, JEEScore, Department)
              VALUES ('$studentID', '$studentName', '$emailID', '$grade12th', '$JEEScore', '$Department')";

if ($conn->query($sqlInsert) === TRUE) {
    echo "Student record inserted successfully";
} else {
    echo "Error: " . $sqlInsert . "<br>" . $conn->error;
}

// Display top 5 students in CSE department based on JEE scores
$sqlSelect = "SELECT studentID, studentName, emailID, 12thGrade, JEEScore, Department
              FROM student19
              WHERE Department = 'CSE'
              ORDER BY JEEScore DESC
              LIMIT 5";

$result = $conn->query($sqlSelect);

if ($result->num_rows > 0) {
    echo "<h2>Top 5 Students in CSE Department</h2>";
    echo "<table border='1'>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Email ID</th>
                <th>12th Grade</th>
                <th>JEE Score</th>
                <th>Department</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["studentID"] . "</td>
                <td>" . $row["studentName"] . "</td>
                <td>" . $row["emailID"] . "</td>
                <td>" . $row["12thGrade"] . "</td>
                <td>" . $row["JEEScore"] . "</td>
                <td>" . $row["Department"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
}

.container {
    max-width: 400px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
}

input {
    padding: 8px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

</style>
<body>
    <div class="container">
        <h2>Student Admission Form</h2>
        <form method="post">
            <label for="studentID">Student ID:</label>
            <input type="text" name="studentID" required>

            <label for="studentName">Student Name:</label>
            <input type="text" name="studentName" required>

            <label for="emailID">Email ID:</label>
            <input type="email" name="emailID" required>

            <label for="12thGrade">12th Grade:</label>
            <input type="text" name="12thGrade" required>

            <label for="JEEScore">JEE Score:</label>
            <input type="number" name="JEEScore" required>

            <label for="Department">Department:</label>
            <input type="text" name="Department" required>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>