<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade</title>
</head>
<body>
    <form method="post">
        Enter your Grades: <input type="number" name="grades"><br>
        <input type="submit" name="submit">
    </form>

    <?php
        if(isset($_POST['grades'])){
            $grades = $_POST['grades'];

            if($grades >= 60)
            {
                echo "First Division";
            }
            else if(59 >= $grades && $grades >= 45)
            {
                echo "Second Division";
            }
            else if(44 >= $grades && $grades >= 33)
            {
                echo "Third Division";
            }
            else if(33> $grades){
                echo "Fail";
            }
            else{
                echo "Invalid input";
            }
        }
    ?>
</body>
</html>