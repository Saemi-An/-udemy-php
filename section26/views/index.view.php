<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PJ | 날씨</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
    <main class="main">
        <div class="container" style="background-image: url(images/<?php echo e($info->weatherType); ?>-bg.svg);">
            <div class="top">

                <div class="top__sect">
                    <div class="icon__location"></div>
                    <p class="txt__20"><?php echo e($info->city); ?></p>
                </div>
               
                <div class="top__sect">
                    <p class="txt__20 txt__700"><?php echo date('l'); ?></p>
                    <p class="txt__20 txt__700"><?php echo e(date('d')); ?><span class="small_th">th</span></p>
                </div>

            </div>
            <div class="bottom">

                <img src="images/<?php echo e($info->weatherType); ?>-large.svg" alt="" class="bottom__img">
                
                <div class="bottom__textarea">

                    <!-- <p class="txt__96"><?php echo e($info->getFahrenheit()); ?>K</p> -->
                    <p class="txt__96"><?php echo e($info->getCelsius()); ?>°</p>

                    <div class="bottom__textarea__withIcon">
                        <img src="images/icon-sunny.svg" alt="Sunny" class="icon__weather">
                        <p class="text__28"><?php echo ucfirst(e($info->weatherType)); ?></p>
                    </div>

                </div>

            </div>
        </div>
    </main>
</body>
</html>