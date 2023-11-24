<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>first</title>
</head>
<body>
    <?php
    $numericArray = array(1,22,33,23,4,2);

    echo "Numeric Array before sorting:";
    echo "<pre>";
    print_r($numericArray);
    echo "</pre>";
    
    sort($numericArray);
    echo "Numeric Array after sorting:";
    echo "<pre>";
    print_r($numericArray);
    echo "</pre>";

    rsort($numericArray);
    echo "Numeric Array after sorting reverse:";
    echo "<pre>";
    print_r($numericArray);
    echo "</pre>";

    $associativeArray = array("Name"=>"Sarthak", "Age"=>20, "City"=>"Pune");

    echo "Associative Array before sorting:";
    echo "<pre>";
    print_r($associativeArray);
    echo "</pre>";

    asort($associativeArray);
    echo "Associative Array after sorting:";
    echo "<pre>";
    print_r($associativeArray);
    echo "</pre>";

    arsort($associativeArray);
    echo "Associative Array after ar sorting:";
    echo "<pre>";
    print_r($associativeArray);
    echo "</pre>";

    ksort($associativeArray);
    echo "Associative Array after K sorting:";
    echo "<pre>";
    print_r($associativeArray);
    echo "</pre>";

    krsort($associativeArray);
    echo "Associative Array after kr sorting:";
    echo "<pre>";
    print_r($associativeArray);
    echo "</pre>";

    $multidimensionalArray = array(array(1,2,3,4,5),
    array(10,20,30,40,50),
    array(5,4,3,32,1),
    array(23,4,32,21,2));

    echo "Multidimensional array before sorting: ";
    echo "<pre>";
    print_r($multidimensionalArray);
    echo "</pre>";

    ?>
</body>
</html>