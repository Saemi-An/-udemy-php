<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>이미지 갤러리</title>
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


    
    <!-- 메인 -->
    <main class="main">
        <section class="gallery">
            <?php foreach( $imageTitles AS $img => $title ): ?>
                <?php if ($img === "not_found.jpg") continue; ?>
                <a href="image.php?<?php echo http_build_query(["image" => "{$img}"]); ?>" class="gallery_piece">
                    <div class="gallery_piece_img_div">
                        <img src="images/<?php echo rawurlencode($img); ?>" alt="<?php echo e($img); ?>">
                    </div>
                    <p><?php echo e($title); ?></p>
                </a>
            <?php endforeach; ?>
        </section>
    </main>



    <!-- 푸터 -->
    <?php include "views/footer.html"; ?>
</body>
</html>
