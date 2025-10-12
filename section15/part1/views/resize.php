<?php

$file = __DIR__ . '/key-ring.jpeg';
// $file = __DIR__ . '/header.jpeg';

// 1. 이미지 원본 크기 가져오기
[ $wid, $hei ] = getimagesize($file);

// 2. EXIF 회전 정보 확인
    // EXIF란? 이미지 파일에 포함된 EXIF(Exchangeable Image File Format) 헤더 정보를 읽어오는 기능 또는 라이브러리
$exif = @exif_read_data($file);
    // var_dump($exif);
    // ["Height"]=>int(3024)
    // ["Width"]=>int(4032)
    // ["Orientation"]=>int(6)
$orientation = $exif['Orientation'] ?? 1;

// 3. 원본 이미지 열기
$img = imagecreatefromjpeg($file);

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

// 새로운 빈 이미지를 사이즈만 맞춰서 만들기
$newImg = imagecreatetruecolor($newWid, $newHei);

// 원본 이미지를 새로운 빈 이미지에 복사하며 복사하며 리사이징
    // imagecopyresampled(
    //     $newImg,      // 대상 이미지 (크기: 400x400)
    //     $img,         // 원본 이미지 (크기: 3024x4032)
    //     0, 0,         // 대상 위치: (x=0, y=0) ← 좌상단에서 시작
    //     0, 0,         // 원본 시작 위치: (x=0, y=0) ← 원본 전체 사용
    //     $newWid, $newHei,  // 대상 이미지 내 크기
    //     $wid, $hei         // 원본 이미지 크기
    // );
    // 즉, dst_x와 dst_y는 복사된 이미지가 대상 이미지 안에서 어디에 위치할지 지정하는 것

    // 리사이징과 동시에 exif 정보도 지워짐
imagecopyresampled($newImg, $img, 0, 0, 0, 0, $newWid, $newHei, $wid, $hei);

// 7. 브라우저에 출력
// // 브라우저에 이미지를 보낼 것이라 헤더 설정
// header('Content-Type: image/jpeg');

// // 이미지를 브라우저에 output / btye로 나옴
// imagejpeg($newImg);
// imagedestroy($img);
// imagedestroy($newImg);

// 7.2 저장하기
imagejpeg($newImg, 'img_sacled.jpeg');

?>