<pre><?php


var_dump($_POST);
var_dump($_FILES);


// 파일이 전송 되었고 & 파일 이미지 데이터가 있다면
if ( !empty($_FILES) && !empty($_FILES['img']) ) {
    
    // 이미지 파일에 에러 없고(0) & 이미지 파일 사이즈가 0이 아니라면
    if ( $_FILES['img']['error'] === 0 && $_FILES['img']['size'] !== 0 ) {

        
        // 업로드된 이미지 파일을 임시 위치에서 특정 위치로 저장
        $fileName = pathinfo($_FILES['img']['name'], PATHINFO_FILENAME);
        $fileExtension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        // 파일명 검사
        $newFileName = preg_replace('/[^a-zA-Z0-9]/', '', $fileName) . '____' . time() . '.jpeg';
        move_uploaded_file($_FILES['img']['tmp_name'], __DIR__ . '/uploads/' . $newFileName);
        
    }
}


?></pre>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>파일을 업로드 해보자!</h1>
    <form method="POST" action="upload.php" enctype="multipart/form-data">
        <input type="file" name="img">
        <input type="submit" value="저장하기">
    </form>
</body>
</html>