<?php
function e($val) {
    return $val . htmlspecialchars($val, 'ENT_QOUTES', 'UTF-8');
}

var_dump($_SERVER);

$tncError = false;

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

    if ( !empty($_POST['tnc']) ) {
        header('Location: thankyou.php');
        die();
    }
}
else {
    $tncError = true;
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>뉴스 레터</title>
    <style>
        .form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
    </style>
</head>
<body>
    <form method="POST" action="newsletter.php" class="form">
        <label for="user_name">이름: </label>
        <input type="text" name="user_name" id="user_name" value="<?php if ( $_POST['user_name'] ) echo e($_POST['user_name']); ?>">
        
        <label for="user_email">이메일: </label>
        <input type="email" name="user_email" id="user_email" value="<?php if ( $_POST['user_email'] ) echo e($_POST['user_email']); ?>">

        <div>
        <?php if ( $_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST['tnc']) ): ?>
            <p style="color: red;">사용 약관에 동의해 주세요.</p>
        <?php endif; ?>
            <input type="checkbox" name="tnc" value="true" id="tnc">
            <label for="tnc">뉴스 레터 수신 및 구독에 동의 합니다.</label>
        </div>

        <input type="submit" value="확인">
    </form>
</body>
</html>