<?php
    require __DIR__ . '/../inc/db-connect.inc.php';
    require __DIR__ . '/../inc/functions.inc.php';


    // $id = 11;
    // $title = "test 18";
    // $message = "테스트 18번";
    // $date = "2025-08-18";

    // $stat = $pdo->prepare(
    //     'INSERT INTO `journal` (`id`, `title`, `message`, `date`) VALUES (:id, :title, :message, :date)'
    // );
    // $stat->execute([
    //     ':id' => $id,
    //     ':title' => $title,
    //     ':message' => $message,
    //     ':date' => $date,
    // ]);


?>


<!-- 모달 -->
<div class="modalWrapper">
    <section class="modal">
        <p class="modal__txt__title">⚠️ Warning</p>
        <p class="modal__txt__cnt" id="modalMsg"></p>
        <button class="modal__btn">
            <span>확인</span>
        </button>
    </section>
</div>


<!-- 헤더 -->
<?php require __DIR__ . '/header.view.php' ?>


<!-- 메인 -->
<main class="main">

    <!-- 페이지 헤더 -->
    <h1 class="txt__pageTitle">My Diary</h1>

    <!-- 폼 -->
    <form method="POST" action="index.php" class="form" enctype="multipart/form-data">
        
        <!-- 제목 -->
        <div class="inputWrapper">
            <input type="text" id="title" name="title" class="postInput" placeholder="제목을 입력해 주세요.">
            <label for="title" class="inputLabel">Title :</label>
        </div>

        <!-- 날짜 -->
        <div class="inputWrapper">
            <input type="date" id="date" name="date" class="postInput">
            <label for="date" class="inputLabel">Date :</label>
        </div>

        <!-- 이미지 -->
        <div class="inputWrapper">
            <input type="file" id="img" name="img" class="postInput imgInput">
            <label for="img" class="inputLabel">Image :</label>
        </div>
        
        <!-- 내용 -->
        <div class="inputWrapper">
            <textarea id="message" name="message" rows="12" class="postTextarea" maxlength="800" placeholder="내용을 입력해 주세요."></textarea>
            <label for="message"></label>
        </div>

        <!-- 제출 버튼 -->
        <button class="submitBtn">
            <div class="submitBtn__wrapper">
                <!-- 아이콘 svg -->
                <div class="submitBtn__svg">
                    <svg viewBox="0 0 34.7163912799 33.4350009649">
                        <g style="fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2px;">
                        <polygon class="uuid-227ecc73-5fef-4efb-920c-3f9dd27ef3fc" points="20.6844359446 32.4350009649 33.7163912799 1 1 10.3610302393 15.1899978903 17.5208901631 20.6844359446 32.4350009649"/>
                        <line class="uuid-227ecc73-5fef-4efb-920c-3f9dd27ef3fc" x1="33.7163912799" y1="1" x2="15.1899978903" y2="17.5208901631"/>
                        </g>
                    </svg>
                </div>
                <!-- 버튼 텍스트 -->
                <span class="submitBtn__text">저장하기</span>
            </div>
        </button>
    </form>

    <!-- 스크립트 -->
    <script>

        // 내용 작성시 800자 넘어가면 모달 띄우기
        document.getElementById('message').addEventListener('keyup', (e) => {
            if ( e.target.value.length > 800) {
                showModal('내용은 공백 포함 최대 800자까지 입력 가능합니다.');
                return;
            }
        })

        // 저장하기 버튼 클릭 이벤트
        document.querySelector('.submitBtn').addEventListener('click', (e) => {
            e.preventDefault();
            
            // 유효성 검사 =======================================
            const title = document.getElementById('title');
            const date = document.getElementById('date');
            const message = document.getElementById('message');

            // 제목
            if ( title.value === '' ) {
                showModal('제목을 입력해 주세요.');
                return;
            }
            if ( title.value.length > 80 ) {
                showModal('제목은 공백 포함 최대 80자까지 입력 가능합니다.');
                return;
            }
            
            // 날짜
            if ( date.value === '' ) {
                showModal('날짜를 입력해 주세요.');
                return;
            }

            // 내용
            if ( message.value === '' ) {
                showModal('내용을 입력해 주세요.');
                return;
            }
            if ( message.value.length > 800 ) {
                showModal('내용은 공백 포함 최대 800자까지 입력 가능합니다.');
                return;
            }

            // 유효성 검사 통과시 제출 =======================================
            document.querySelector('form').submit();
        })
        
        // 모달 보여주기 + 텍스트 설정
        function showModal(msg) {
            const modalMsg = document.getElementById('modalMsg');

            modalMsg.innerText = msg;
            document.querySelector('.modalWrapper').style.display = "flex";
            document.querySelector('body').style.overflow = 'hidden';
        }

        // 모달 확인 버튼 클릭시 모달 닫기
        document.querySelector('.modal__btn').addEventListener('click', () => {
            document.querySelector('.modalWrapper').style.display = "none";
            document.querySelector('body').style.overflow = '';
        })

    </script>
</main>
