<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Days</title>
</head>
<body>
    <form method="post">
        Enter numbers between 1 to 7: <input type="number" name="number"><br>
        <input type="submit">
    </form>

    <?php
        if(isset($_POST['number'])){
            $number = $_POST['number'];

            switch ($number) {
                case '1':
                    echo "Monday";
                    break;
                
                case '2':
                    echo "Tuesday";
                    break;

                case '3':
                    echo "Wednesday";
                    break;

                case '4':
                    echo "Thursday";
                    break;

                case '5':
                    echo "Friday";
                    break;

                case '6':
                    echo "Saturday";
                    break;

                case '7':
                    echo "Sunday";
                    break;
                
                default:
                    echo "Invalid Input";
                    break;
            }
        }
    ?>
</body>
</html>