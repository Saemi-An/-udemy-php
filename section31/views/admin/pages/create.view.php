<section class="pageContentContainer">

    <h1>새로운 페이지 등록</h1>

    <form action="?route=admin/pages/create" method="POST" class="createForm">
    
        <div class="inputContainer">
            <label for="title">페이지 제목: </label>
            <input type="text" name="title" id="title" 
                value="<?php if ( !empty($_POST['title']) ) echo e((string)($_POST['title'])); ?>"
            >
        </div>
    
        <div class="inputContainer">
            <label for="slug">페이지 url: </label>
            <input type="text" name="slug" id="slug" 
                value="<?php if ( !empty($_POST['slug']) ) echo e((string)($_POST['slug'])); ?>"
            >
        </div>
        
        <div class="inputContainer">
            <label for="content">페이지 내용: </label>
            <textarea name="content" id="content" rows="4" cols="45"><?php 
                if ( !empty($_POST['content']) ) echo e((string)($_POST['content']));
            ?></textarea>
        </div>

        <div class="formSubmitBtn">
            <div class="formErrorContainer">
                <?php if ( !empty($errors) ): ?>
                    <?php foreach( $errors AS $error ): ?>
                        <p class="formError"><?php echo e($error);?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <button type="submit">저장하기 😊</button>
        </div>
        
    </form>
</section>