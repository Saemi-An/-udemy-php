<?php

header('Content-Type: text/plain');

class PostsRepository {
    public function __construct(
        private string $pdo,
        private string $helper
    ) {}
}

class PostsController {
    public function __construct(
        private PostsRepository $postsRepository
    ) {}
}

/* 컨트롤러 사용을 위해 항상 반복적으로 레포를 만든 후 컨트롤러에 넘겨줘야함.
$postsRepository = new PostsRepository('PDO', 'HELPER');
$postsController = new PostsController($postsRepository);
*/

class Container {
    public function getPostsRepository(): PostsRepository {
        return new PostsRepository('PDO', 'HELPER');
    }
    public function getPostsController(): PostsController {
        return new PostsController($this->getPostsRepository());
    }
}

$container = new Container();
$postsController = $container->getPostsController();

var_dump($postsController);