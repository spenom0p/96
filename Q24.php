<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>table</title>
</head>
<body>
    <form method="post">
        Enter a number:
        <input type="number" name="number">
        <input type="submit">
    </form>

    <?php
        if (isset($_POST['number'])) {
            $number = $_POST['number'];
            for ($i=1; $i<=10; $i++) { 
                $result = $number * $i;
                echo $result."<br>";
            }
        }
    ?>
</body>
</html>