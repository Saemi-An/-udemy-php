<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>
        <?php
        
$cart = ["크림치즈 에그스콘", "발로나 휘낭시에", "솔티카라멜 휘낭시에"];

// 있나 없나 확인 - 인덱스로
var_dump($cart[100]);

var_dump(isset($cart[100]));

var_dump(empty($cart[100]));

echo "------\n";
        
// 있나 없나 확인 - 요소 자체로
var_dump(in_array("딸기 케이크", $cart));

// legnth 확인하기
var_dump(count($cart));

// 없으면 넣어줘!
if (!in_array("녹차 티그레", $cart)) {

    echo "장바구니에 없음. 새로 넣어야함.\n";
    
    $cart[count($cart)+1] = "녹차 티그레";
    
    var_dump($cart);
}

echo("\n\n\n\n\n");
// 배열 조작하기 - 수정

$shop_list = ["솔티카라멜 휘낭시에(2)", "아이스 블루베리 스콘(1)", "호지차 티그레(1)"];

$shop_list[0] = "솔티카라멜 휘낭시에(4)";

var_dump($shop_list);

// 배열 조작하기 - 삭제: !인덱스 자동 정렬 안됨!
unset($shop_list[1]);
var_dump($shop_list);

$shop_list[10] = "신메뉴";
var_dump($shop_list);

$shop_list[] = "딸기 오레오 생크림 케이크(1)";
var_dump($shop_list);



        ?>
    </pre>
</body>
</html>