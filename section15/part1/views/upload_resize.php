<pre><?php

// 유저가 저장한 사진을 scale down 하여 썸네일로 서버에 저장하기


var_dump($_POST);
var_dump($_FILES);

function test($origin, $dest) {

    // 1. 이미지 원본 크기 가져오기
    [ $wid, $hei ] = getimagesize($origin);

    // 2. EXIF 회전 정보 확인
    $exif = @exif_read_data($origin);
    $orientation = $exif['Orientation'] ?? 1;


    // 3. 원본 이미지 열기
    $img = imagecreatefromjpeg($origin);

    // 4. EXIF 회전에 따라 이미지 회전
    switch ($orientation) {
        case 3:
            $img = imagerotate($img, 180, 0);
            break;
        case 6:
            $img = imagerotate($img, -90, 0);
            [$wid, $hei] = [$hei, $wid]; // 회전했으니 가로/세로 바꿔줌
            break;
        case 8:
            $img = imagerotate($img, 90, 0);
            [$wid, $hei] = [$hei, $wid]; // 회전했으니 가로/세로 바꿔줌
            break;
    }

    // 5. 스케일 계산
    $maxDim = 400;
    $scaleFactor = $maxDim / max($wid, $hei);
    $newWid = intval($wid * $scaleFactor);
    $newHei = intval($hei * $scaleFactor);

    // 6. 새 크기로 리사이즈

    $newImg = imagecreatetruecolor($newWid, $newHei);

    imagecopyresampled($newImg, $img, 0, 0, 0, 0, $newWid, $newHei, $wid, $hei);

    imagejpeg($newImg, $dest);


}


// 파일이 전송 되었고 & 파일 이미지 데이터가 있다면
if ( !empty($_FILES) && !empty($_FILES['img']) ) {
    
    // 이미지 파일에 에러 없고(0) & 이미지 파일 사이즈가 0이 아니라면
    if ( $_FILES['img']['error'] === 0 && $_FILES['img']['size'] !== 0 ) {

        
        // 업로드된 이미지 파일을 임시 위치에서 특정 위치로 저장
        $fileName = pathinfo($_FILES['img']['name'], PATHINFO_FILENAME);
        $fileExtension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        // 파일명 검사
        $newFileName = preg_replace('/[^a-zA-Z0-9\_\-]/', '', $fileName) . '____' . time() . '.jpeg';

        // scale down
        $originalImg = $_FILES['img']['tmp_name'];
        $dstImg = __DIR__ . '/uploads/' . $newFileName;
        test($originalImg, $dstImg);

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
    <form method="POST" action="upload_resize.php" enctype="multipart/form-data">
        <input type="file" name="img">
        <input type="submit" value="저장하기">
    </form>
</body>
</html>