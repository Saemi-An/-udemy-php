__DIR__는 PHP의 **서버 내부 경로 (예: /Applications/XAMPP/...)**입니다.
하지만 <img src="...">에 들어가는 값은 브라우저가 요청할 **웹 경로(URL)**여야 합니다.

<img src="/Applications/XAMPP/xamppfiles/htdocs/php/section15/.../key-ring.jpeg">
브라우저는 절대 이런 경로를 찾을 수 없습니다.

<img src="/php/section15/part1/views/key-ring.jpeg" alt="">
XAMPP 기준으로 htdocs가 웹 루트입니다 (http://localhost/).
그러므로 /php/...는 브라우저에서 유효한 URL 경로가 됩니다.