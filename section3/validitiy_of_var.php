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
        // isset(): 변수 존재 유무에 따라 true/false 반환
        echo "isset() 테스트\n";

        $Descartes = '데카르트';
        $humanExistence;

        var_dump(isset($Descartes));
        var_dump(isset($humanExistence));   // 선언 되었지만 할당된 값이 없는 변수

        echo("\n\n");

        // empty():
        echo "empt() 테스트\n";

        $emotion = 0;
        var_dump(empty($charge));   // 선언되지 않은 변수 ==> (사실 아예 없지만) 비어있다.
        var_dump(empty($humanExistence));   // 선언 되었지만 할당된 값이 없음 ==> 비어있다.
        var_dump(empty($emotion));   // falsy값은 '비어있다'고 판정됨

        
    ?></pre>
    <?php 

        // 다음 두개의 if문은 동일한 사실상 조건을 지님
        if ( isset($Descartes) && $Descartes !== '' ) { // 변수 선언 및 공백값이 아니면
            echo "<h1>{$Descartes}는 말했다.</h1>";
        }

        if ( !empty($Descartes) ) { // 변수가 비어있지 않으면
            echo "<h1>{$Descartes}는 말했다.</h1>";
        }

    ?>
</body>
</html>