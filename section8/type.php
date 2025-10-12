<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php
    
    $num = 15;
    $str = "Hey";
    
    var_dump(is_bool($num));
    var_dump(is_numeric($num));
    var_dump(is_integer($num));
    var_dump(is_float($num));
    var_dump(is_string($str));
    var_dump(is_array($num));
    
    ?></pre>
</body>
</html>