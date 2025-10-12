<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <pre><?php
    var_dump($_POST);
    ?></pre>

    <form action="post.php" method="POST">
        <label for="id">아이디: <input type="text" name="id" value="<?php if( !empty($_POST["id"]) ) echo $_POST["id"] ?>"></label>
        <label for="pw">비밀번호: <input type="password" name="pw"></label>
        <button type="submit">로그인</button>
    </form>



</body>
</html>