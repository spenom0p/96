<form method="post">
 Enter a number: <input type="number" name="number">
 <input type="submit" value="Check Prime">
</form>

<?php
function isPrime($num) {
 if ($num <= 1) return false;
 if ($num <= 3) return true;
 if ($num % 2 == 0 || $num % 3 == 0) return false;
 
 for ($i = 5; $i * $i <= $num; $i += 6) {
 if ($num % $i == 0 || $num % ($i + 2) == 0) return false;
 }
 
 return true;
}
if (isset($_POST['number'])) {
 $number = $_POST['number'];
 $isPrime = isPrime($number);
 
 if ($isPrime) {
 echo "$number is a prime number.";
 } else {
 echo "$number is not a prime number.";
 }
}
?>