<?php header('Content-Type: text/plain');

// DB 커넥션을 위한
class PostsRepository {
    public function __construct(
        private string $pdo,
        private string $helper
    ) {}
}

// 뷰페이지 렌더링을 위한
class PostsController {
    public function __construct(
        private PostsRepository $postsRepository
    ) {}
}

class Recipes {

}


// 필수 객체 자동생성을 위한 컨테이너
class Container {
    private array $instances = [];
    private array $recipes = [];   // $revipes는 private으로 유지

    // 레시피를 등록하는 public 함수
    public function bind(string $what, \Closure $recipe) {
        $this->recipes[$what] = $recipe;
    }

    public function get(string $what) {
        if ( empty($this->instances[$what]) ) {

            if ( empty($this->recipes[$what]) ) {
                echo "{$what} 객체 레시피 존재하지 않음으로 생성 불가.\n";
                die();
            }
            $this->instances[$what] = $this->recipes[$what]();
        }
        return $this->instances[$what];
    }

}

// 컨테이너 생성
$container = new Container();

// 레시피 등록 함수를 통해 레시피 등록
$container->bind('postsRepository', function() {
    return new PostsRepository('PDO', 'HELPER');
});
$container->bind('postsController', function() use($container){
    return new PostsController($container->get('postsRepository'));
});

// 컨테이너를 통해 객체 생성
$postsRepository = $container->get('postsRepository');
var_dump($postsRepository);

$postsController = $container->get('postsController');
var_dump($postsController);

$container->get('abc');