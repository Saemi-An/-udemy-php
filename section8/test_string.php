<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php
    
$emailContent = "Dear alex  ,\n\nWe hope this message finds you well.\n\nThis month, we are focusing on personal growth and innovation. Don't miss out on our exclusive insights!\n\nBest wishes,\nYour Discovery Network Team\nP.S. Check out our latest blog post!";

$emailContent = "Dear Chaotic,\n\nThis is the email body content.\n\nBest wishes";

var_dump($emailContent);
echo "\n\n시작: \n\n\n\n";

// TASK - 1: $emailPreview = 본문 첫 30글자 + "..."
$without_dear = substr($emailContent, 4);

$splitted_without_dear = explode("\n\n", $without_dear);

unset($splitted_without_dear[0]);

$emailPreview = substr(implode("\n\n", $splitted_without_dear), 0, 30) . "...";


// TASK - 2: $charCount = 본문 전체 글자수 카운트
// $charCount = strlen($splitted[1]);
unset($splitted_without_dear[count($splitted_without_dear)]);

$charCount = strlen(implode("", $splitted_without_dear)) + count($splitted_without_dear) * 2;

// TASK - 3: $updatedEmailContent = 이름 trim() & ucfirst() 해서 전체 출력
$raw_name = substr(explode("\n\n", $emailContent)[0], 4);

$lower_name = strtolower(trim(substr($raw_name, 0, -1)));

$name = ucfirst($lower_name);
// // Dear Alex,\n\n

$tmp = explode("\n\n", $emailContent);
$tmp[0] = "Dear " . $name . ",";

$updatedEmailContent = implode("\n\n", $tmp);
var_dump($updatedEmailContent);

    ?></pre>

</body>
</html>