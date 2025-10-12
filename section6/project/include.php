<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sect6.Project</title>
    <link rel="stylesheet" href="./statics/project.css"></link>
</head>
<body>
    <!-- 공통 데이터 및 함수 -->
    <pre><?php
    function e($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }

    $pages = [
        "chowon" => "초원",
        "arthur" => "아더",
        "jjangkko" => "짱꼬",
        "meerkat" => "미어캣",
    ];

    ?></pre>

    <!-- 공통 폼 -->
    <form action="include.php" method="GET">
        <select name="page">
            <option value="">선택해 주세요.</option>

            <?php foreach($pages AS $key => $val): ?>
                <option value="<?php echo e($key); ?>" <?php if (!empty($_GET["page"]) && $_GET["page"] === e($key)) echo "selected"; ?>>
                    <?php echo e($val); ?>
                </option>
            <?php endforeach; ?>

            <!-- <option value="chowon" <?php if( !empty($_GET["page"]) && $_GET["page"] === "chowon" ) echo "selected"; ?>>초원</option>
            <option value="arthur" <?php if( !empty($_GET["page"]) && $_GET["page"] === "arthur" ) echo "selected"; ?>>아더</option>
            <option value="jjangkko" <?php if( !empty($_GET["page"]) && $_GET["page"] === "jjangkko" ) echo "selected"; ?>>짱꼬</option>
            <option value="meerkat" <?php if( !empty($_GET["page"]) && $_GET["page"] === "meerkat" ) echo "selected"; ?>>미어캣</option> -->
        </select>
        <button type="submit">검색</button>
    </form>

    <!-- 개별 컨텐츠 -->
    <?php
        // php 코드 없이 html 컨텐츠만 있는 경우 사용: file_get_contents
            // include 사용시 해커가 xss 공격으로 evil_code.php로 바꿔버리면 그대로 악성 php 파일이 실행됨
            // 하지만 file_get_contents 사용시 단순 문자열로 파일을 불러옴
    
        // 검색어 목록에 있는 애들만 컨텐츠 리턴
            // 검색어 목록에 없을 경우 not_found 페이지 노출

        if (!empty($_GET["page"])) {
            $page = e($_GET["page"]);

            if (!empty($pages[$page])) {
                echo file_get_contents("pages/{$page}.html");
            } else {
                echo file_get_contents("pages/not_found.html");
            }
        }
    ?>
</body>
</html>