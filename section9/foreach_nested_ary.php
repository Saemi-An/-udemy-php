<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p {
            margin-left: 32px;
        }
    </style>
</head>
<body>
    <pre><?php

    function e($val) {
        return htmlspecialchars($val, ENT_QUOTES, "UTF-8");
    }
    
    $courses = [
        [
            "code" => "A001",
            "desc" => "English for beginners",
            "flag" => "🇺🇸",
            "topics" => [
                "Alphabet",
                "Numbers",
                "Greetings",
            ]
        ],
        [
            "code" => "B001",
            "desc" => "Japanges for beginners",
            "flag" => "🇯🇵",
            "topics" => [
                "Hiragana",
                "Gatakana",
                "Numbers",
            ]
        ],
        [
            "code" => "C001",
            "desc" => "German for beginners",
            "flag" => "🇩🇪",
            "topics" => [
                "Special German Alphabets",
                "How to Pronounce Alphabets",
                "Numbers",
            ]
        ],
        [
            "code" => "D001",
            "desc" => "Chinese for beginners",
            "flag" => "🇨🇳",
        ],
    ];
    
    foreach($courses AS $course) {
        var_dump($course); 
    }
    echo "<ul>";
    foreach ($courses[count($courses) - 1]["topics"] AS $topic) {
        echo "<li>{$topic}</li>";
    }
    echo "</ul>";

    ?></pre>

    <?php foreach ($courses AS $course): ?>
        <details>
            <summary><?php echo e($course["flag"]) . " | 과목 코드:  " . e($course["code"]); ?></summary>
            <p><?php echo e($course["desc"]); ?></p>
            <?php if ( !empty($course["topics"]) ): ?>
                <ul>
                    <?php foreach($course["topics"] AS $topic): ?>
                        <li><?php echo e($topic); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </details>
        
    <?php endforeach; ?>

</body>
</html>