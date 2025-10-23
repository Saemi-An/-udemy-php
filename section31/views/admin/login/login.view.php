<h1>어드민 로그인</h1>

<form method="POST" action="index.php?<?php echo http_build_query(['route' => 'admin/login']); ?>" class="loginForm">
    <input type="hidden" name="_csrf" value="<?php echo e(csrf_token()); ?>"> 

    <?php if ( $loginError ) echo '<p class="formErrorMsg">아이디와 비밀번호를 확인해 주세요.</p>'; ?>

    <div class="loginInputContainer">
        <label for="login-username">아이디: </label>
        <input type="text" id="login-username" name="username" value="<?php if ( !empty($_POST['username']) ) echo e($_POST['username']); ?>">
    </div>

    <div class="loginInputContainer">
        <label for="login-password">비밀번호: </label>
        <input type="password" id="login-password" name="password" value="">
    </div>

    <div class="loginSubmitContainer">
        <input type="submit" value="로그인 😊">
    </div>

</form>
