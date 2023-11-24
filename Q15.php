<?php

if( isset($_POST['sid'],$_POST['sname'],$_POST['mail'],$_POST['grade'],$_POST['jee']))
{
    $sid = $_POST['sid'];
    $sname = $_POST['sname'];
    $mail = $_POST['mail'];
    $grade = $_POST['grade'];
    $jee = $_POST['jee'];

    $conn = new mysqli('localhost','root','','mit');

    $sql = "insert into stud values('$sid','$sname','$mail','$grade','$jee')";

    if( $conn->query($sql) === true)
    echo "Recordadded Successfully<br>";
    else
    echo "Failed";

    $res = $conn->query("select * from stud order by JEEScore desc limit 5");

    echo "<table border='1'>
    <tr>
        <th>studentID</th>
        <th>studentName</th>
        <th>emailID</th>
        <th>12thGrade</th>
        <th>JEEScore</th>
    </tr>";

while ($row = $res->fetch_assoc()) {
echo "<tr>
        <td>{$row['studentID']}</td>
        <td>{$row['studentName']}</td>
        <td>{$row['emailID']}</td>
        <td>{$row['12thGrade']}</td>
        <td>{$row['JEEScore']}</td>
      </tr>";
}

echo "</table>";




}



?>

<form method = "post">

Student Id : <input type='number' name='sid'> <br>
Student Name : <input type='text' name='sname'><br>
Student Email : <input type='text' name='mail'><br>
Student Grade : <input type='text' name='grade'><br>
Student Jee Score : <input type='number' name='jee'><br>

<br> <button type="submit">Click </button> <br>



</form>