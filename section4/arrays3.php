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

// 배열의 랜덤 요소 뽑기
$circle = [
    "Saemi",
    "Song",
    "Hansol",
    "Cho-Won",
    "Arthur",
    "Hwa-Yong",
];

$random_idx = rand(0, count($circle)-1);

var_dump($circle[$random_idx]);

echo "랜덤 요소: {$circle[$random_idx]}\n\n\n";


$playlist = ['Starry Night', 'Moonlit Walk', 'Whispering Wind', 'Golden Horizon'];

if ( count($playlist) > 0 ) {
    echo "Your lastly added song was: '{$playlist[count($playlist) - 1]}'.";
};

if ( 0 < count($playlist) < 4 ) {
    $playlist[] = $songRecommendations[rand(0, count($songRecommendations) - 1)];
};        
    
        
        
        
        
        ?>
    </pre>
</body>
</html>