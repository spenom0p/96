<form method="post">
 Enter a number: <input type="number" name="number">
 <input type="submit" value="Calculate Factorial">
</form>
<?php
    function factorial($n) {
        if ($n <= 1) {
            return 1;
        } 
        else {
            return $n * factorial($n - 1);
        }
    }
if (isset($_POST['number'])) {
    $number = $_POST['number'];
    $result = factorial($number);
    echo "Factorial of $number is $result";
   }
   ?>