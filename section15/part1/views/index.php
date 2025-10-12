<?php

require __DIR__ . '/../inc/functions.inc.php';
require __DIR__ . '/../inc/db-connect.inc.php';

date_default_timezone_set('Asia/Seoul');

function saveThumbnailImg($origin, $dest) {

    // 1. 이미지 원본 크기 가져오기
    $imgSize = getimagesize($origin);

    // 이미지 파일이 아닌 경우 예외처리
    if ( !empty($imgSize) ) {

        [ $wid, $hei ] = $imgSize;

        // 2. EXIF 회전 정보 확인
        $exif = @exif_read_data($origin);
        $orientation = $exif['Orientation'] ?? 1;
    
        // 3. 원본 이미지 열기
        $img = imagecreatefromjpeg($origin);

        if ( !empty($img) ) {
            
            // 4. EXIF 회전에 따라 이미지 회전
            switch ($orientation) {
                case 3:
                    $img = imagerotate($img, 180, 0);
                    break;
                case 6:
                    $img = imagerotate($img, -90, 0);
                    [$wid, $hei] = [$hei, $wid]; // 회전했으니 가로/세로 바꿔줌
                    break;
                case 8:
                    $img = imagerotate($img, 90, 0);
                    [$wid, $hei] = [$hei, $wid]; // 회전했으니 가로/세로 바꿔줌
                    break;
            }
        
            // 5. 스케일 계산
            $maxDim = 400;
            $scaleFactor = $maxDim / max($wid, $hei);
            $newWid = intval($wid * $scaleFactor);
            $newHei = intval($hei * $scaleFactor);
        
            // 6. 새 크기로 리사이즈
            $newImg = imagecreatetruecolor($newWid, $newHei);
            imagecopyresampled($newImg, $img, 0, 0, 0, 0, $newWid, $newHei, $wid, $hei);
            
            // 7. 서버사이드에 저장
            imagejpeg($newImg, $dest);
            return true;
        }
    }
    return false;
}



// POST 요청 ==============================================================

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

    // 타입캐스팅과 널 병합연산자를 활용하여 POST로 넘어온 유저 데이터의 타입을 string으로 보장함
    $title = (string) ($_POST['title'] ?? '');
    $message = (string) ($_POST['message'] ?? '');
    $date = (string) ($_POST['date'] ?? '');
    $img = $_POST['img'] ?? '';

    // 초기 세팅
    $newFileName = null;

    // 파일이 전송 되었고 & 파일 이미지 데이터가 있다면
    if ( !empty($_FILES) && !empty($_FILES['img']) ) {
        
        // 이미지 파일에 에러 없고(0) & 이미지 파일 사이즈가 0이 아니라면
        if ( $_FILES['img']['error'] === 0 && $_FILES['img']['size'] !== 0 ) {

            // 업로드된 이미지 파일을 임시 위치에서 특정 위치로 저장
            $fileName = pathinfo($_FILES['img']['name'], PATHINFO_FILENAME);
            $fileExtension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
            // 파일명 검사
            $newFileName = preg_replace('/[^a-zA-Z0-9\_\-]/', '', $fileName) . '____' . time() . '.jpeg';

            // scale down
            $originalImg = $_FILES['img']['tmp_name'];
            $dstImg = __DIR__ . '/uploads/' . $newFileName;
            $isUploadSuccessed = saveThumbnailImg($originalImg, $dstImg);

        }
    }

    // sql문 준비
    $stat = $pdo->prepare('INSERT INTO `journal` (`title`, `message`, `date`, `img`) VALUES (:title, :message, :date, :img)');
    // 네임드 파라미터 바인딩
    $stat->execute([
        ':title' => $title,
        ':message' => $message,
        ':date' => $date,
        ':img' => $newFileName,
    ]);

    // Post-Redirect-Get
        // HTTP 응답 헤더에 Location: index.php를 추가 --> 다시 index.php로 GET 요청
    header("Location: index.php");
    // header() 호출 후에도 PHP는 계속 실행됨으로 exit을 통해 즉시 종료시킴
        // 폼 재제출 방지
        // 새로고침시 중복 INSERT 방지
    exit;

}

// GET 요청 ==============================================================

// 기본값 세팅
$perPage = 2;
$offset = 0;
$crntPage = 1;

// 총 페이지 수 구하기
$stat = $pdo->prepare('SELECT COUNT(*) AS totalRows FROM `journal`');
$stat->execute();
$totalRows = $stat->fetch(PDO::FETCH_ASSOC)['totalRows'];
$totalPages = (int) (ceil($totalRows / $perPage));   // 올림

// 페이징 있을 경우 변수 재할당
if ( !empty($_GET['page']) ) {

    $crntPage = (int) ($_GET['page'] ?? 1);

    // 현재 페이지가 범위를 벗어나는 경우 예외처리
    if ( $crntPage < 0 ) $crntPage = 1;
    if ( $crntPage > $totalPages ) $crntPage = $totalPages;

    $offset = (int) ($perPage * ($crntPage - 1));

}

// GET 요청에 맞는 데이터 가져오기
$stat = $pdo->prepare('SELECT * FROM `journal` ORDER BY `date` DESC, `id` DESC LIMIT :perPage OFFSET :offset');
$stat->bindValue('perPage', (int) $perPage, PDO::PARAM_INT);
$stat->bindValue('offset', (int) $offset, PDO::PARAM_INT);
$stat->execute();
$results = $stat->fetchAll(PDO::FETCH_ASSOC);

?>


<!-- 헤더 -->
<?php require __DIR__ . '/header.view.php'; ?>


<!-- 메인 -->
<main class="main">
    
    <!-- 페이지 헤더 -->
    <h1 class="txt__pageTitle">September, 2025</h1>

    <!-- 카드 -->
    <section class="cardsContainer">
        <ul class="cards">

            <?php foreach( $results AS $result ): ?>
                <a href="" class="cards__a">
                    <li class="cards__li">
                        <?php if ( !empty($result['img']) ): ?>
                            <div class="cards__li__left">
                                <img src="uploads/<?php echo $result['img']; ?>" alt="" class="cards__li__left__img">
                            </div>
                        <?php else: ?>
                            <!-- <img src="../static/images/arthur2.jpeg" alt="" class="cards__li__left__img"> -->
                        <?php endif; ?>
                        <div class="cards__li__right">
                            <?php
                                $dateExploded = explode('-', $result['date']);
                                $unixTimestamp = mktime(0, 0, 0, $dateExploded[1], $dateExploded[2], $dateExploded[0]);
                            ?>
                            <p class="card__txt__week"><?php echo e(date('Y . m . d', $unixTimestamp)); ?></p>
                            <p class="card__txt__title"><?php echo e($result['title']); ?></p>
                            <p class="cards__li__right__preview"><?php echo nl2br(e($result['message'])); ?></p>
                        </div>
                    </li>
                </a>
            <?php endforeach; ?>

        </ul>
    </section>

    <!-- 페이징 -->
    <section class="pagingContainer">
        <ul class="paging">

            <?php if ( $crntPage !== 1 ): ?>
                <!-- 이전으로 -->
                <li class="paging__li">
                    <a href="index.php?<?php echo http_build_query(['page' => ($crntPage - 1)]); ?>" class="paging__li__a pagingArrow">
                        <span>
                            <svg width="12" height="12" viewBox="0 0 16 16">
                                <path style="fill: currentColor" d="M10.89 15.96L13.07 13.76L7.29001 8.00001L13.05 2.26001L10.89 0.0400085L2.93001 8.00001L10.89 15.96Z"/>
                            </svg>
                        </span>
                    </a>
                </li>
            <?php endif; ?>

            <!-- 일반 페이지 -->
            <?php for ( $i=1; $i<=$totalPages; $i++ ): ?>
                <li class="paging__li">
                    <!-- <a href="" class="paging__li__a active"> -->
                    <a href="index.php?<?php echo http_build_query(['page' =>  $i]); ?>" class="paging__li__a <?php if ( $crntPage === $i ) echo 'active'; ?>">
                        <span><?php echo $i; ?></span>
                    </a>
                </li>
            <?php endfor; ?>

            <?php if ( $crntPage !== $totalPages ): ?>
                <!-- 다음으로 -->
                <li class="paging__li">
                    <a href="index.php?<?php echo http_build_query(['page' => ($crntPage + 1)]); ?>" class="paging__li__a pagingArrow">
                        <span>
                            <svg width="12" height="12" viewBox="0 0 16 16">
                                <path style="fill: currentColor" d="M5.11005 15.96L2.93005 13.76L8.71005 8.00001L2.95005 2.26001L5.11005 0.0400085L13.0701 8.00001L5.11005 15.96Z"/>
                            </svg>
                        </span>
                    </a>
                </li>
            <?php endif; ?>

        </ul>
    </section>

</main>



<script>

    function detectLanguage(str) {
        // 일기 내용 최소 글자수 20 (DB에서 설정 필요)
        // 한글이 포함되기만 하면 무조건 '한글 일기'로 판정함
        let sample = str.slice(0, 20);
        if ( /[ㄱ-ㅎㅏ-ㅣ가-힣]/.test(sample) ) return "한글";
        if ( /[a-zA-Z]/.test(sample) ) return "영어";
    }

    function setPreviewEllipis() {
        let previews = document.querySelectorAll(".cards__li__right__preview");
        
        // (예외처리) 카드가 있을 경우에만
        if ( previews.length > 0 ) {

            previews.forEach(pre => {
                
                // 한글인지 영어인지에 따라 노출 가능한 최대 글자수 설정 (한글 - 77, 영어 - 153)
                let maxStringNum = 77;
                if ( detectLanguage(pre.innerText) === "영어" ) maxStringNum = 153;

                // maxStringNum보다 긴 경우 말줄임
                let strPre = pre.innerText;
                if ( strPre.length > maxStringNum ) pre.innerText = strPre.slice(0, maxStringNum) + " . . .";
            })

        }
    }

    setPreviewEllipis();

</script>
