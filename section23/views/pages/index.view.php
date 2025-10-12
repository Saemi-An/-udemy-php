<section class="crowded_cities">

    <h3>도시 인구 밀집도 순위</h3>

    <ul class="crowded_cities_list">
        <?php foreach( $entries AS $city ): ?>
            <li>
                <a href="city.php?<?php echo http_build_query(['id' => e($city->id)]); ?>">
                    <?php echo e($city->getCityWithCountry()); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <div class="paging">
        <ul>
            <!-- 뒤로가기 버튼 -->
            <?php if ( $crntPage !== 1 ): ?>
            <a href="index.php?<?php echo http_build_query(['page' => ($crntPage - 1)]); ?>">
                <li>👈🏽</li>
            </a>
            <?php endif; ?>
            

            <!-- 페이지 -->
            <?php for( $i = max(1, $crntPage - 5); $i <= min($totalPage, $crntPage + 5); $i++ ): ?>
            <a href="index.php?<?php echo http_build_query(['page' => $i]); ?>">
                <li class="<?php if ( $i === $crntPage ) echo 'active' ?>">
                    <?php echo $i; ?>
                </li>
            </a>
            <?php endfor; ?>
            

            <!-- 앞으로 가기 버튼 -->
            <?php if ( $crntPage !== $totalPage ): ?>
            <a href="index.php?<?php echo http_build_query(['page' => ($crntPage + 1)]); ?>">
                <li>👉🏽</li>
            </a>
            <?php endif; ?>

        </ul>
        <p class="paging_index"><?php echo e($crntPage); ?> / <?php echo($totalPage); ?></p>
    </div>

</section>