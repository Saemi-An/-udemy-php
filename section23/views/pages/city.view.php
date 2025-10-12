<?php
/**
 * @var WorldCityModel $city
 */
?>
<section class="city_detail">
    <h1><?php echo e($city->city); ?></h1>

    <table>
        <tbody>
            <tr>
                <th>국가명</th>
                <td><?php echo e($city->country); ?></td>
            </tr>
            <tr>
                <th>국가 코드</th>
                <td><?php echo e($city->iso2); ?></td>
            </tr>
            <tr>
                <th>국기</th>
                <td><?php echo e($city->getFlag()); ?></td>
            </tr>
            <tr>
                <th>도시명</th>
                <td><?php echo e($city->city); ?></td>
            </tr>
            <tr>
                <th>인구 수</th>
                <td><?php echo e($city->getFormattedPopulation()); ?></td>
            </tr>
        </tbody>
    </table>

    <a href="edit.php?<?php echo http_build_query(['id' => e($city->id)]); ?>" class="edit_btn">데이터 수정</a>
</section>
