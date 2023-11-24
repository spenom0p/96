<?php
if (isset($_POST['number'])) {
 $number = $_POST['number'];
 $reversed = strrev($number);
 echo "Reversed number: $reversed";
}
?>
<form method="post">
 Enter an integer: <input type="number" name="number">
 <input type="submit" value="Reverse Digits">
</form>