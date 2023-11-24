
<?php
if (isset($_POST['number'])) {
 $number = $_POST['number'];
 $result = sqrt($number);
 echo "Square Root of $number is $result";
}
?>
<form method="post">
 Enter a number: <input type="number" name="number">
 <input type="submit" value="Calculate Square Root">
</form>