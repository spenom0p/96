<?php

$conn = new mysqli('localhost:3325','root','','mit');

if(isset($_POST['cid'],$_POST['cname'],$_POST['loc'],$_POST['dept'],$_POST['date']))
{
    $cid = $_POST['cid'];
    $cname = $_POST['cname'];
    $loc = $_POST['loc'];
    $dept = $_POST['dept'];
    $date = $_POST['date'];

    $sql = "insert into company values('$cid','$cname','$loc','$dept','$date')";

    $conn->query($sql);

    echo"
    <table border=2> 
    <tr>  
         <th> CID </th> <th> Cname </th> <th> Location </th> <th> Dept </th> <th> Date </th>
    </tr>
    ";

    $res = $conn->query("select * from company where RegistrationDate < '2023-05-18'");

    while($row = $res->fetch_assoc())
    {
        echo "
        <tr>
            <td>{$row['companyID']}</td>
            <td>{$row['companyName']}</td>
            <td>{$row['Location']}</td>
            <td>{$row['Department']}</td>
            <td>{$row['RegistrationDate']}</td>
        </tr>
        ";
    }

    echo "</table>";
}



?>




<form method='post'>

    <br><br>

    Enter Company ID  : <input type='number' name= 'cid'><br>
    Enter Company Name  : <input type='text' name= 'cname'><br>
    Enter Company Location  : <input type='text' name= 'loc'><br>
    Enter Company Department  : <input type='text' name= 'dept'><br>
    Enter Company Date  : <input type='text' name= 'date'><br>

    <button type='submit'>Submit</button> 


    <br><br><br>

</form>