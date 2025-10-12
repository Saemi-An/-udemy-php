<!-- 필터링된 알파벳과 관련된 이름 목록 -->
<ul>
<?php foreach( $filtered_names AS $name ): ?>
    <li>
        <a href="name.php?<?php echo http_build_query(['name' => $name]); ?>">
            <?php echo $name; ?>
        </a>
    </li>
<?php endforeach; ?>
</ul>

<!-- 페이지네이션 -->
<ul class="paging">

    <!-- 뒤로가기 버튼 -->
    <?php if ( $pagination['crnt_page'] !== 1 ): ?>
    <li>
        <a href="char.php?<?php echo http_build_query(['char' => $char, 'page' => ($pagination['crnt_page'] - 1)]) ?>">
            <span>👈🏽</span>
        </a>
    </li>
    <?php endif; ?>

    <?php for( $i=1; $i<=$pagination['total_pages']; $i++ ): ?>

    <li class="<?php if ( ($pagination['crnt_page'] === $i) ) echo 'active' ?>">
        <a href="char.php?<?php echo http_build_query(['char' => $params['char'], 'page' => $i]); ?>">
            <span><?php echo e($i); ?></span>
        </a>
    </li>
    
    <?php endfor; ?>

    <!-- 앞으로 가기 버튼 -->
    <?php if ( $pagination['crnt_page'] !== (int) $pagination['total_pages'] ): ?>
    <li>
        <a href="char.php?<?php echo http_build_query(['char' => $char, 'page' => ($pagination['crnt_page'] + 1)]) ?>">
            <span>👉🏽</span>
        </a>
    </li>
    <?php endif; ?>

</ul>
