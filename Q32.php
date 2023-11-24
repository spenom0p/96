<form method="post">
 Enter a string: <input type="text" name="input">
 <input type="submit" value="Transform String">
</form>

<?php
if (isset($_POST['input'])) {
 $input = $_POST['input'];
 $uppercase = strtoupper($input);
 $lowercase = strtolower($input);
 $firstUpper = ucfirst($input);
 $wordsUpper = ucwords($input);
 
 echo "Uppercase: $uppercase<br>";
 echo "Lowercase: $lowercase<br>";
 echo "First character uppercase: $firstUpper<br>";
 echo "First character of all words uppercase: $wordsUpper<br>";
}
?>