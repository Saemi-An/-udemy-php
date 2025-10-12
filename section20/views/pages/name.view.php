<!-- 검색된 이름에 대한 상세 정보 -->
<h3 style="text-align: center"><?php echo $name; ?></h3>

<?php if ( !empty($detail) ): ?>
<table class="table">
    <thead>
        <tr>
            <th>연도</th>
            <th>이름 붙은 아기 수</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ( $detail AS $d ): ?>
        <tr>
            <td><?php echo $d['year'] . '년' ?></td>
            <td><?php echo number_format($d['count']) . '명' ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>
<h3 style="text-align: center">찾으시는 이름이 존재하지 않습니다 :(</h3>

<?php endif; ?>