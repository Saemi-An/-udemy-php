<?php
header('Content-Type: text/plain');


$msg = 'Happy 30th Birthday!';
$msg_2 = '123Happy 30th Birthday!';


// '어떤 문자*' - '어떤 문자'가 0개 이상되는지 확인
// $match = null;
// var_dump(preg_match('/\d*/', $msg, $match));
// var_dump($match);


// '어떤 문자+' - '어떤 문자'가 1개 이상되는지 확인
// $match = null;
// var_dump(preg_match('/*\d+/', $msg, $match));
// var_dump($match);


// '어떤 문자 혹은 공백?' - '어떤 문자 혹인 공백'이 0개 이상되는지 확인하지만, 옵셔널함.
// 즉, 공백이 있던 말던 
// $match = null;
// var_dump(preg_match('/\d+ ?th/', $msg, $match));
// var_dump($match);


// \w{6} - 정확히 6글자의 단어 문자
// \w{6,} - 6글자 이상의 단어 문자
$match = null;
var_dump(preg_match('/\w{6,}/', $msg, $match));
var_dump($match);