<?php

$conn = new mysqli('localhost:3325','root','','mit');

if(isset($_POST['id'],$_POST['name'],$_POST['pass']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $pass = $_POST['pass'];

    if(!empty($id) || !empty($name) || !empty($pass))
    {
        $sql = "insert into cred values('$id','$name','$pass')";
        $conn->query($sql);
    }

    $newid = $_POST['newid'];
    $newpass = $_POST['newpass'];

    if(!empty($newid) || !empty($newpass))
    {
        $sql = "update cred set Password='$newpass' where Userid='$newid'";
        $conn->query($sql);

        echo "<br>";
        $res = $conn->query("select * from cred where Userid='$newid'");

        echo "<br><br>";
        echo "ID : '$newid'"." <br> New Password = '$newpass'";
        echo "<br>";
    }

}


?>


<form method='post'>

Enter User ID   : <input type='number' name='id'> <br>
Enter User name : <input type='text' name='name'> <br>
Enter User Pass : <input type='text' name='pass'> <br>
<button type='submit'>Click </button>

<br><br>
For Update:
<br><br><br>
Enter ID : <input type='number' name='newid'><br>
Enter new Password : <input type='text' name='newpass'><br>
<button type='submit'>Update</button>

</form>