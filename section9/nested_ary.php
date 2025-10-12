<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php
    
    $names = [
        "English for beginners",
        "Japanges for beginners",
        "German for beginners",
    ];
    $codes = [
        "A001",
        "B001",
        "C001",
    ];
    $flags = [
        "🇺🇸",
        "🇯🇵",
        "🇩🇪",
    ];

    // nested array
    $courses = [
        [
            "code" => "A001",
            "description" => "English for beginners",
            "flag" => "🇺🇸",
        ],
        [
            "code" => "B001",
            "descriptsion" => "Japanges for beginners",
            "flag" => "🇯🇵",
        ],
        [
            "code" => "C001",
            "descriptsion" => "German for beginners",
            "flag" => "🇩🇪",
        ],
    ];
    var_dump($courses);
    
    var_dump($courses[0]["flag"]);
    ?></pre>
</body>
</html>