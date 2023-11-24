<?php

    $conn = new mysqli('localhost:3325','root','bhavani','wtl');

    if( isset( $_POST['cid'],$_POST['cname'],$_POST['loc'],$_POST['dept'] ) )
    {
        $cid = $_POST['cid'];
        $cname = $_POST['cname'];
        $loc = $_POST['loc'];
        $dept = $_POST['dept'];

        if(!empty($cid) || !empty($cname) || !empty($loc) || !empty($dept))
        {
            $sql = "insert into company values('$cid','$cname','$loc','$dept')";
            if($conn->query($sql) === true)
            echo 'Record successfully Inserted <br><br>';
            else
            echo 'Error <br><br>';
        }

        

        $res = $conn->query("select * from company");

        echo "<table border=2>
        <tr> <th>CID</th>  <th>CName</th> <th>Location</th> <th>Dept</th> </tr>";

        while($row = $res->fetch_assoc())
        {
            echo
            "<tr>
                <td>{$row['companyID']}</td>
                <td>{$row['companyName']}</td>
                <td>{$row['Location']}</td>
                <td>{$row['Department']}</td>
            </tr>";
        }

        echo "</table";
    }

    if(isset($_POST['search']))
    {
        $search = $_POST['search'];
        $s = $conn->query("select * from company where Location = '$search'");

            echo "<br><br>";
           
            echo " <table border=1>
            <tr> <th>CID</th>  <th>CName</th> <th>Location</th> <th>Dept</th> </tr>";

            while($r = $s->fetch_assoc())
        {
            echo
            "<tr>
                <td>{$r['companyID']}</td>
                <td>{$r['companyName']}</td>
                <td>{$r['Location']}</td>
                <td>{$r['Department']}</td>
            </tr>";
        }

        echo "</table>"; 
            
        
    }



?>


<form method="post">

<br><br><br>

Enter Company ID         :<input type="number" name='cid'> <br>
Enter Company Name       :<input type="text" name='cname'> <br>
Enter Company Location   :<input type="text" name='loc'> <br>
Enter Company Department :<input type="text" name='dept'> <br>
<button type = 'submit'>ADD </button>

<br><br>

Enter City :: <input type="text" name="search"> <br>
<button type = 'submit'>Search </button>

<br><br>


</form>
