<?php header('Content-Type: text/plain');

// DB 커넥션을 위한
class PostsRepository {
    public function __construct(
        private string $pdo,
        private string $helper
    )
    {
        echo "PostsRepository 생성자 호출됨\n";
    }
}

// 뷰페이지 렌더링을 위한
class PostsController {
    public function __construct(
        private PostsRepository $postsRepository
    ) {}
}


// 
class Container {
    private array $instances = [];   // 생성된 객체를 담는 배열
    private array $recipes = [];   // 객체 생성 레시피

    public function __construct() {
        // $recipes['postsRepository'] 속성을 익명함수로 정의
        // 레시피에 배열 안에 존재하는 키에 맞게 그 값을 익명함수로 정의
        $this->recipes['postsRepository'] = function() {
            return new PostsRepository('PDO', 'HELPER');
        };
        
        // $recipes['postsController'] 속성을 익명함수로 정의
        $this->recipes['postsController'] = function() {
            return new PostsController($this->recipes['postsRepository']);
        };
    }

    // 객체를 가져오는 함수
        // 생성자에서 객체 생성 레시피 등록이 선취되어야함
    public function get(string $what) {

        // postsRepository 존재하지 않을 경우 새로 만들기
        if ( empty($this->instances[$what]) ) {

            // [예외 처리] postsRepository의 레시피가 존재하지 않을 경우 프로그램 종료
            if ( empty($this->recipes[$what]) ) {
                echo "{$what} 객체 레시피 존재하지 않음으로 생성 불가.\n";
                die();
            }

            // $recipes['postsRepository'] 호출
            // 레시피 키값을 호출하여(객체 생성 레시피를 호출하여) instances 배열에 담음
            $this->instances[$what] = $this->recipes[$what]();

        }
        
        // postsRepository가 이미 존재할 경우 기존의 postsRepository를 사용
        return $this->instances[$what];
      
    }

}

$container = new Container();

// DB 연결은 최초 1회만 필요함. 하지만 매번 새로 생성하고 있음
// 컨테이너에 private 속성을 만들고 한번 DB 연결이 되면 계속 그것을 만들도록 변경 후, 여러개의 DB 커넥션이 만들어지지 않음
$postsRepository = $container->get('postsRepository');
var_dump($postsRepository);

$postsController = $container->get('postsControllerㄱㄱㄱ');
var_dump($postsController);