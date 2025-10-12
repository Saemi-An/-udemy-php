<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>다이어리</title>
    <link rel="stylesheet" type="text/css" href="../static/css/styles.css"></link>
    <!-- 구글 폰트 패밀리 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Epunda+Slab:ital,wght@0,300..900;1,300..900&family=Nanum+Myeongjo&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="header__innerWrapper">
            <a href="index.php">
                <div class="header__left">
                    <div class="header__left__logoContainer">
                        <svg viewBox="0 0 60.7863869853 60.7863869853">
                            <path style="fill: currentColor;" d="m45.589790239,30.3931934927c8.3928407749,0,15.1965967463-6.8037559715,15.1965967463-15.1965967463S53.9826310139,0,45.589790239,0H15.196554313C6.8037135382,0,0,6.8037559715,0,15.1965967463v30.3931934927c0,8.3928407749,6.8037135382,15.1965967463,15.196554313,15.1965967463h30.393235926c8.3928407749,0,15.1965967463-6.8037559715,15.1965967463-15.1965967463s-6.8037559715-15.1965967463-15.1965967463-15.1965967463Z"/>
                        </svg>
                        <!-- <img src="../static/images/logo.svg" alt=""> -->
                    </div>
                    <p>새미의 다이어리</p>
                </div>
            </a>
            
            <button class="header__right" onclick="location.href='form.php'">
                <div class="header__right__plusContainer">
                    <svg viewBox="0 0 44.4901230052 44.4901230053">
                        <g style="fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2px;">
                            <circle cx="22.2450615026" cy="22.2450615026" r="21.2450615026"/>
                            <line x1="22.2450615026" y1="13.4699274037" x2="22.2450615026" y2="31.0201956015"/>
                            <line x1="31.0201956015" y1="22.2450658041" x2="13.4699274037" y2="22.2450572011"/>
                        </g>
                    </svg>
                    <!-- <img src="../static/images/plus.svg" alt=""> -->
                </div>
                <span>일기 쓰기</span>
            </button>
        </div>
    </header>
</body>
</html>