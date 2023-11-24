<form method="post">
 Enter temperature: <input type="number" name="temp">
 Convert to:
 <select name="convertTo">
 <option value="FtoC">°F to °C</option>
 <option value="CtoF">°C to °F</option>
 </select>
 <input type="submit" value="Convert Temperature">
</form>

<?php
if (isset($_POST['temp'])) {
 $temp = $_POST['temp'];
 $convertTo = $_POST['convertTo'];
 if ($convertTo == 'FtoC') {
 $result = ($temp - 32) * 5/9;
 echo "$temp °F is equal to $result °C.";
 } elseif ($convertTo == 'CtoF') {
 $result = ($temp * 9/5) + 32;
 echo "$temp °C is equal to $result °F.";
 }
}
?>