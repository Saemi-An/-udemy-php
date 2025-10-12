<form method="POST" action="edit.php?<?php echo http_build_query(['id' => $city->id]); ?>">

    <div class="input_container">
        <label for="city">도시명: </label>
        <input type="text" name="city" id="city" value="<?php echo e($city->city); ?>" required>
    </div>

    <div class="input_container">
        <label for="country">국가: </label>
        <input type="text" name="country" id="country" value="<?php echo e($city->country); ?>" required>
    </div>

    <div class="input_container">
        <label for="iso2">국가 코드: </label>
        <input type="text" name="iso2" id="iso2" value="<?php echo e($city->iso2); ?>" required>
    </div>

    <div class="input_container">
        <label for="population">인구 수: </label>
        <input type="number" name="population" id="population" value="<?php echo e(($city->population)); ?>" required>
    </div>

    <div class="btn_container">
        <input type="submit" value="저장하기">
    </div>

</form>