<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php
    
// www.mysite.com/myurls?name=Saemi
var_dump($_GET);
    
echo "\n\n";

echo $_GET[0];


    ?></pre>

    <?php if ( !empty($_GET) ): ?>
        <h1><?php echo "Welcome back, {$_GET['name']}"; ?></h1>
        <p><?php echo "Your membership is {$_GET['status']}."; ?></p>
    
    <?php endif; ?>


</body>
</html>