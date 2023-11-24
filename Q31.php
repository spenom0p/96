<form method="post">
 Enter a string: <input type="text" name="input">
 <input type="submit" value="Check Palindrome">
</form>

<?php
function isPalindrome($str) {
 $str = strtolower(str_replace(' ', '', $str));
 return $str == strrev($str);
}
if (isset($_POST['input'])) {
 $input = $_POST['input'];
 if (isPalindrome($input)) {
 echo "$input is a palindrome.";
 } else {
 echo "$input is not a palindrome.";
 }
}
?>