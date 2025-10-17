<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PJ | CMS</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
    <header class="header">
        <h1>CMS</h1>
        <nav>
        <?php foreach( $navigation AS $nav ): ?>
            <a 
                href="index.php?<?php echo http_build_query(['page' => $nav->slug]); ?>" 
                class="<?php if ( !empty($page) && !empty($page->id) && ($page instanceof \App\Model\PageModel) && $page->slug === $nav->slug ) echo 'active'; ?>"
            >
                <?php echo e($nav->title); ?>
            </a>
        <?php endforeach; ?>
        </nav>
    </header>
    
    <main class="main">
        <?php echo $contents; ?>
    </main>
    
    <footer class="footer"></footer>
</body>
</html>