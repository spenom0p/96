<form method="post">
 Enter consumed units: <input type="number" name="units">
 <input type="submit" value="Calculate Bill">
</form>


<?php
if (isset($_POST['units'])) {
 $units = $_POST['units'];
 $bill = 0;
 if ($units <= 50) {
 $bill = $units * 3.50;
 } elseif ($units <= 150) {
 $bill = 50 * 3.50 + ($units - 50) * 4.00;
 } elseif ($units <= 250) {
 $bill = 50 * 3.50 + 100 * 4.00 + ($units - 150) * 5.20;
} else {
    $bill = 50 * 3.50 + 100 * 4.00 + 100 * 5.20 + ($units - 250) * 6.50;
    }
    echo "Electricity Bill: Rs. $bill";
   }
   ?>