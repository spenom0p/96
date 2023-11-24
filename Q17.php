<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        Roll no: <input type="number" name="rollNo"><br>
        Class: <input type="number" name="class"><br>
        Student Name: <input type="text" name="name"><br>
        Contact: <input type="number" name="contact"><br>
        Mentor Name: <input type="text" name="mentor"><br>
        Issues Discussed: <input type="text" name="issue"><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>

<?php


// Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'endsem');

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $studRollNo = $_POST['rollNo'];
    $studClass = $_POST['class'];
    $studName = $_POST['name'];
    $studContact = $_POST['contact'];
    $mentorName = $_POST['mentor'];
    $issuesDiscussed = $_POST['issue'];
// Function to insert a student-mentor meeting record
    function insertRecord($studRollNo, $studClass, $studName, $studContact, $mentorName, $issuesDiscussed) {
        global $conn;

        // Prepare SQL query
        $sql = "INSERT INTO student_mentor (studRollNo, studClass, studName, studContact, mentorName, issuesDiscussed) VALUES (?, ?, ?, ?, ?, ?)";

        // Prepare statement
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param("ssssss", $studRollNo, $studClass, $studName, $studContact, $mentorName, $issuesDiscussed);

        // Execute query
        if ($stmt->execute()) {
            echo "Record inserted successfully.<br>";
        } else {
            echo "Error inserting record: " . $stmt->error . "<br>";
        }

        // Close statement
        $stmt->close();
}

// Function to display records where student is absent
function displayAbsentRecords() {
    global $conn;
    
    // Prepare SQL query
    $sql = "SELECT * FROM student_mentor WHERE studName = 'Absent'";

    // Execute query
    $result = $conn->query($sql);

    // Check if any records found
    if ($result->num_rows > 0) {
        echo "<h2>Records where student is absent:</h2>";
        echo "<table>";
        echo "<tr><th>Roll No</th><th>Class</th><th>Name</th><th>Contact</th><th>Mentor</th><th>Issues Discussed</th></tr>";

        // Fetch data from each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["studRollNo"] . "</td>";
            echo "<td>" . $row["studClass"] . "</td>";
            echo "<td>" . $row["studName"] . "</td>";
            echo "<td>" . $row["studContact"] . "</td>";
            echo "<td>" . $row["mentorName"] . "</td>";
            echo "<td>" . $row["issuesDiscussed"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No records found where student is absent.<br>";
    }
}

// Example usage
// Insert a record
insertRecord($studRollNo, $studClass, $studName, $studContact, $mentorName, $issuesDiscussed);

// Display absent records
displayAbsentRecords();
?>