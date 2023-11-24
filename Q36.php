<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
</head>
<body>
    <h2>Add Student record</h2>
    <form method="post">
        Roll number: <input type="text" name="rollNumber"><br>
        Name: <input type="text" name="name"><br>
        City: <input type="text" name="city"><br>
        Pin code: <input type="text" name="pinCode"><br>
        <input type="submit" name="submit" value="AddRecord">
    </form>
    <h2>Display Records</h2>
    <form method="post" action="">
        <input type="submit" name="display" value="Display Records">
    </form>
    <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "endsem";

        $conn = new mysqli($servername, $username, $password, $database);

        if($conn->connect_error){
            die("Connection failed: ".$conn->connect_error);
        }

        function addstud($rollNumber, $name, $city, $pinCode){
            global $conn;

            $sql = "insert into Student(RollNumber, Name, City, PinCode) VALUES ('$rollNumber', '$name', '$city', '$pinCode')";

            if($conn->query($sql)===TRUE){
                echo "Record added successfully";
            }
            else{
                echo "Record adding error".$conn->error;
            }
        }

        if(isset($_POST['submit'])){
            $rollNumber = $_POST['rollNumber'];
            $name = $_POST['name'];
            $city = $_POST['city'];
            $pinCode = $_POST['pinCode'];

            addstud($rollNumber, $name, $city, $pinCode);
        }

        function displayRecords() {
            global $conn;
        
            $sql = "SELECT * FROM Student";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>Roll Number</th>
                            <th>Name</th>
                            <th>City</th>
                            <th>Pin Code</th>
                        </tr>";
        
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['RollNumber'] . "</td>
                            <td>" . $row['Name'] . "</td>
                            <td>" . $row['City'] . "</td>
                            <td>" . $row['PinCode'] . "</td>
                        </tr>";
                }
        
                echo "</table>";
            } else {
                echo "No records found";
            }
        }
    ?>

    <?php
    // Check if the display button is clicked
    if (isset($_POST['display'])) {
        // Display all student records
        displayRecords();
    }
    ?>
</body>
</html>