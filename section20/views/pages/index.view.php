<!-- 가장 많이 사용된 아기 이름 순위 -->
<table class="table">
    <thead>
        <tr>
            <th>순위</th>
            <th>이름</th>
            <th>사용된 횟수</th>
        </tr>
    </thead>
    <tbody>
        <?php for ( $i = 0; $i < 10; $i++ ): ?>
        <tr>
            <td><?php echo $i + 1; ?></td>
            <td>
                <a href="name.php?<?php echo http_build_query(['name' => $statistics[$i]['name']]); ?>">
                    <?php echo $statistics[$i]['name']; ?>
                </a>
            </td>
            <td><?php echo number_format($statistics[$i]['sum']) . '회'; ?></td>
        </tr>
        <?php endfor; ?>
    </tbody>
</table>