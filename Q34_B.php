<form  method="post">
    Enter no: <input type="number" name="number"><br>
    <input type="submit">
</form>

<?php
if(isset($_POST['number'])){
    $number = $_POST['number'];
    function is_Power_of_four($n)
    {
      $x = $n;
      while ($x % 4 == 0) {
      $x /= 4;
    }
       
	if($x == 1)
    {
		return "$n is power of 4";
    }
    else
    {
		return "$n is not power of 4";
    } 
}
echo is_Power_of_four($number);
}

?>