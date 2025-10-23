<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PJ | ADMIN</title>
    <link rel="stylesheet" type="text/css" href="styles/admin.css">
</head>
<body>
    <header class="header">
        <h1>CMS | Admin</h1>
        <?php if ( !empty($isLoggedIn) ): ?>
            <a href="index.php?<?php echo http_build_query(['route' => 'admin/logout']); ?>" class="logoutBtn">로그아웃</a>
        <?php endif; ?>
    </header>
    
    <main class="main">
        <?php echo $contents; ?>
    </main>
    
    <footer class="footer"></footer>
</body>
</html>