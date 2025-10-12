<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>이미지 갤러리 | 상세</title>
    <link rel="stylesheet" href="static/gallery.css"></link>
</head>
<body>
    <!-- 인클루드 -->
    <?php
    include "inc/functions.inc.php";
    include "inc/images.inc.php";
    ?>

    <!-- 헤더 -->
    <?php include "views/header.html"; ?>
    
    <!-- 현재 페이지에서 사용할 함수 -->
    <?php
        // 쿼리스트링에 이미지 키값이 있는지 확인
        function checkParam() {
            return (!empty($_GET["image"])) ? true : false;
        }

        // 이미지 파일명이 데이터베이스에 존재하는지 확인
        function checkFileName() {
            $isExist = checkParam();

            if ( $isExist ) {
                global $imageTitles;
                if ( array_key_exists(e($_GET["image"]), $imageTitles) ) return e($_GET["image"]);
            }

            return "not_found.jpg";
        }
    ?>

    <!-- 메인 -->
    <main class="main">
        <section class="detail">
            <div class="detail_img_div">
                <img src="images/<?php echo checkFileName(); ?>" alt="">
            </div>
            <div class="detail_text_div">
                <h1 class="detail_title"><?php echo $imageTitles[checkFileName()]; ?></h1>
                <p><?php echo $imageDescriptions[checkFileName()]; ?></p>
            </div>
        </section>
        <a href="gallery.php">뒤로가기</a>
    </main>


    <!-- 푸터 -->
    <?php include "views/footer.html"; ?>
</body>
</html>
