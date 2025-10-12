<?php

function e($val) {
    return htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
}

echo '<pre>';

var_dump($_SERVER);

echo '</pre>';

?>

<?php
    // if ( !empty($_POST['name']) ) {
    //     echo '<h1>' . $_POST['name'] . '</h1>';
    // }
    var_dump($_POST);
?>

<form method="POST" action="<?php echo e($_SERVER['PHP_SELF']) ?>">
    <input type="text" name="name">
</form> 