<h1>어드민 인덱스 입니다.</h1>

<table class="indexTable">
    <thead>
        <tr>
            <th>아이디</th>
            <th>제목</th>
            <th>구분자</th>
            <th>내용</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach( $pages AS $page ): ?>
        <tr>
            <td><?php echo e($page->id); ?></td>
            <td><?php echo e($page->title); ?></td>
            <td><?php echo e($page->slug); ?></td>
            <td><?php echo e($page->content); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php?route=admin/pages/create">새로운 페이지 등록</a>