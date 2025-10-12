<?php 
    $isLoggedIn = false;
?>

<?php if (empty($isLoggedIn)): ?>
    <h1>환영합니다. 로그인 하시겠습니까?</h1>
<?php else: ?>
    <h1>안새미 님, 좋은 하루 되세요!</h1>
<?php endif; ?>
        
<h1>
    <?php if (empty($isLoggedIn)): ?>환영합니다. 로그인 하시겠습니까?
    <?php else: ?>안새미 님, 좋은 하루 되세요!
    <?php endif; ?>
</h1>