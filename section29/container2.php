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
    // 컨테이너의 private 속성 postsRepository 자료형의 $postsRepository
    private PostsRepository $postsRepository;
    public function getPostsRepository(): PostsRepository {

        // postsRepository 존재하지 않을 경우 새로 만들기
        if ( empty($this->postsRepository) ) {
            $this->postsRepository = new PostsRepository('PDO', 'HELPER');
        }
        
        // postsRepository가 이미 존재할 경우 기존의 postsRepository를 사용
        return $this->postsRepository;
    }


    private PostsController $postsController;
    public function getPostsController(): PostsController {

        // postsController 존재하지 않을 경우 새로 만들기
        if ( empty($this->postsController) ) {
            $this->postsController = new PostsController($this->getPostsRepository());
        }

        // postsController 이미 존재할 경우 기존의 postsController 사용
        return $this->postsController;
    }
}

$container = new Container();

// DB 연결은 최초 1회만 필요함. 하지만 매번 새로 생성하고 있음
// 컨테이너에 private 속성을 만들고 한번 DB 연결이 되면 계속 그것을 만들도록 변경 후, 여러개의 DB 커넥션이 만들어지지 않음
$postsRepository = $container->getPostsRepository();
var_dump($postsRepository);

$postsController = $container->getPostsController();
var_dump($postsController);
$postsController2 = $container->getPostsController();
var_dump($postsController2);