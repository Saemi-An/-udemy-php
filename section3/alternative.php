<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .body {
            border: 1px solid black;
            border-radius: 12px;
            padding: 16px;
        }
    </style>
</head>
<body class="body">
    <pre><?php
    
        $alphaMale = '그';
        
    ?></pre>
    
    <!-- (원본) php 태그로 감싼 버전 -->
    <?php
        if ( !empty($alphaMale) ) { 
            echo "<h1><p>{$alphaMale}는 말했다.</p></h1>";
        }
    ?>

    <!-- (수정본) html 태그 우선 버전 - Alternative PHP Syntax, HTML 출력용 -->
    <?php if ( !empty($alphaMale) ): ?>
        <h1>
            <p><?php echo $alphaMale; ?>는 말했다.</p>
        </h1>
    <?php endif; ?>

</body>
</html>



<!-- 이거 왜 틀리냐 -->
<div class="coffee-info">
<?php if( !empty($selectedCoffee) && $selectedCoffee === 'espresso' ): ?>

    <div id="espresso-info">
        <h1>Espresso ☕</h1>
        <p>Espresso is a concentrated coffee drink with a bold flavor. It pairs perfectly with a chocolate croissant. 🍫🥐</p>
    </div>

    
<?php else: ?>
    <?php $selectedCoffee = 'drip'; ?>

    <div id="drip-coffee-info">
        <h1>Drip Coffee ☕</h1>
        <p>Drip coffee, a staple in many routines, is known for its straightforward brewing process and comforting, familiar taste. Perfect for starting your morning or as a midday pick-me-up. ☕️🌅</p>
    </div>


<?php endif; ?>
</div>