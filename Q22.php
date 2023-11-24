<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "bhavani";
$dbname = "wtl";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select First Class students from CSE department
$sql = "SELECT rollNo,studentName, passingYear
        FROM students1
        WHERE studDept = 'CSE' AND classGrades = 'First Class'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>First Class Students in CSE Department</h2>";
    echo "<table border='1'>
            <tr>
                <th>Roll No</th>
                <th>Student Name</th>
                <th>Passing Year</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["rollNo"] . "</td>
                <td>" . $row["studentName"] . "</td>
                <td>" . $row["passingYear"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No First Class students found in the CSE department.";
}

$conn->close();
?>
