<?php

$conn = new mysqli('localhost:3325','root','','mit');

    if( isset($_POST['eid'],$_POST['name'],$_POST['dept'],$_POST['sal']) )
    {
        $eid = $_POST['eid'];
        $name = $_POST['name'];
        $dept = $_POST['dept'];
        $sal = $_POST['sal'];

        $sql = "insert into employee values('$eid','$name','$dept','$sal')";

        $conn->query($sql);

        $res = $conn->query("select * from employee where salary > 50000");

        echo "
    <table border=2> <tr> <th>ID</th> <th>Name</th> <th>Dept</th> <th>Salary</th>  </tr>
        ";

        while($row = $res->fetch_assoc())
        {
            echo "<tr>
            <td>{$row['empNo']}</td>
            <td>{$row['empName']}</td>
            <td>{$row['Department']}</td>
            <td>{$row['Salary']}</td>
            </tr>
            ";
        }

        echo "</table>";
    }




?>


<form method='post'>

<br>

Employee ID   : <input type='number' name='eid'> <br>
Employee Name : <input type='text' name='name'> <br>
Employee Dept : <input type='text' name='dept'> <br>
Employee Salary : <input type='number' name='sal'> <br>

<button type='submit'>Click</button>

<br>


</form>