<section class="pageContentContainer">

    <?php if ( empty($page) ): ?>
        <h1>새로운 페이지 등록</h1>
    <?php else: ?>
        <h1></h1>
    <?php endif; ?>

    <form action="?route=admin/pages/create" method="POST" class="createForm">
        <input type="text" name="_csrf" value="<?php echo e(csrf_token()); ?>">
    
        <div class="inputContainer">
            <label for="title">페이지 제목: </label>
            <input type="text" name="title" id="title" 
                <?php if ( empty($page) ): ?>
                    value="<?php if ( !empty($_POST['title']) ) echo e((string)($_POST['title'])); ?>"
                <?php else: ?>
                    value="<?php echo e($page->title); ?>"
                <?php endif; ?>
            >
        </div>
    
        <div class="inputContainer">
            <label for="slug">페이지 url: </label>
            <input type="text" name="slug" id="slug" 
                <?php if ( empty($page) ): ?>
                    value="<?php if ( !empty($_POST['slug']) ) echo e((string)($_POST['slug'])); ?>"
                <?php else: ?>
                    value="<?php echo e($page->slug); ?>";
                <?php endif; ?>
            >
        </div>
        
        <div class="inputContainer">
            <label for="content">페이지 내용: </label>
            <?php if ( empty($page) ): ?>
                <textarea name="content" id="content" rows="4" cols="45"><?php if ( !empty($_POST['content']) ) echo nl2br(e((string)($_POST['content'])));?></textarea>
            <?php else: ?>
                <textarea name="content" id="content" rows="4" cols="45"><?php echo e($page->content);?></textarea>
            <?php endif; ?>
        </div>

        <div class="formSubmitBtn">
            <div class="formErrorContainer">
                <?php if ( !empty($errors) ): ?>
                    <?php foreach( $errors AS $error ): ?>
                        <p class="formError"><?php echo e($error);?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php if ( !empty($page) ): ?>
            <input type="hidden" name="editId" value="<?php echo ($page->id); ?>">
        <?php endif; ?>
            <button type="submit">저장하기 😊</button>
        </div>
        
    </form>
</section>