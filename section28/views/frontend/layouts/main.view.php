<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PJ | CMS</title>
    <!-- index.php 기준 경로: 왜지??? -->
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
    <!-- 헤더 -->
    <header class="header">
        <h1>CMS 페이지 헤더</h1>
        <nav>
            <?php foreach ( $nav AS $key => $val ): ?>
                <!-- 클래스의 if문에서 검증을 반복하는 이유: index.php?route=123인 경우 이슈 -->
                <a 
                    href="index.php?<?php echo http_build_query(['page' => $val->slug]); ?>" 
                    class="<?php if ( !empty($page) && $page instanceof \App\Model\PageModel && $val->slug === $page->slug ) echo 'active'; ?>"
                >
                    <?php echo e($val->title) ?>
                </a>
                <?php if ( $key !== count($nav)-1 ) echo '<span>•</span>'; ?>
            <?php endforeach; ?>
        </nav>
    </header>
    
    <!-- 메인 -->
    <main class="main">
        <?php echo $contents; ?>
    </main>
    
    <!-- 푸터 -->
    <footer class="footer"></footer>
</body>
</html>