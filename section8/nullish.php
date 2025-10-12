<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php
    
    $name = (int) ($_GET["name"] ?? "It's Empty!");
    var_dump($name);
    
    $discount = '15';
    var_dump($discount);

    $finalPrice = 0;
    if (is_integer($discount)) {
        $finalPrice = 100 - $discount;
    } else if (is_float($discount)) {
        $finalPrice = 100 - (100 * $discount);
    }
    echo "the final price is: ";
    var_dump($finalPrice);
    
    ?></pre>
</body>
</html>