<h1>어드민 인덱스 입니다.</h1>

<!-- 에러 메세지 -->
<?php if ( !empty($errors) ): ?>
    <?php foreach( $errors AS $error ): ?>
        <p class="formError"><?php echo e($error);?></p>
    <?php endforeach; ?>
<?php endif; ?>

<!-- 목록 테이블 -->
<table class="indexTable">
    <thead>
        <tr>
            <th>아이디</th>
            <th>제목</th>
            <th>구분자</th>
            <th>내용</th>
            <th>기능</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach( $pages AS $page ): ?>
        <tr>
            <td><?php echo e($page->id); ?></td>
            <td><?php echo e($page->title); ?></td>
            <td><?php echo e($page->slug); ?></td>
            <td><?php echo e($page->content); ?></td>
            <td class="actionTd">
                <form method="POST" action="index.php?<?php echo http_build_query(['route' => 'admin/pages/delete']); ?>">
                <?php
                    /*
                    GET 요청으로 백엔드에서 DB 연결을 하는 것은 안됨 (최대 통계 데이터 업데이트용) ... 모바일에서 링크 꾹 클릭하고 있으면 미리보기가 열리면서 실제 요청이 감 혹은 검색 엔진에 해당 링크가 노출되어 사용자가 클릭할 수 있음 
                    POST 요청으로 데이터베이스에서 데이터를 수정하는 것이 매우 권장됨
                    <a href="">👀</a>
                    <a href="">✍🏽</a>
                    <a href="index.php?<?php echo http_build_query(['route' => 'admin/pages/delete', 'id' => $page->id]); ?>">🗑️</a>
                    */
                ?>
                    <a href="">👀</a>
                    <a href="index.php?<?php echo http_build_query(['route' => 'admin/pages/edit', 'id' => $page->id]); ?>">✍🏽</a>
                    <div>
                        <input type="hidden" name="id" value="<?php echo e($page->id); ?>">
                        <input type="submit" value="🗑️" class="btn-link">
                    </div>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php?route=admin/pages/create">새로운 페이지 등록</a>