<?php

namespace App\Admin\Controller;

use App\Admin\Controller\AbstractAdminController;
use App\Admin\Helper\AuthService;
use App\Repository\PagesRepository;
use App\Model\PageModel;

class PagesAdminController extends AbstractAdminController {

    public function __construct(
        AuthService $authService,
        private PagesRepository $pagesRepository
    ) {
        parent::__construct($authService);
    }

    public function index() {
        // $this->error404();

        $this->render('pages/index', [
            'pages' => $this->pagesRepository->fetchAll(),
        ]);
    }
    
    public function create(?PageModel $page = null) {
        // 예외 처리 셋업
        $errors = [];
        
        // POST 요청 확인
        if ( !empty($_POST) ) {
        
            $title = @(string) ($_POST['title'] ?? '');
            $slug = @(string) ($_POST['slug'] ?? '');
            $content = @(string) ($_POST['content'] ?? '');
            $id = @(int) ($_POST['editId'] ?? 0);

            var_dump($content);

            // slug 유효성 검사
            $slug = strtolower($slug);
            $slug = str_replace(['/', ' ', '.'], ['-', '-', '-'], $slug);
            $slug = preg_replace('/[^a-z0-9\-]/', '', $slug);   // 알파벳 소문자, 숫자, -가 아닌 모든 것들을 삭제

            // 필드값 존재하는지 확인
            if ( !empty($title) && !empty($slug) && !empty($content) ) {

                // slug 중복 없는지 확인
                $slugExist = $this->pagesRepository->checkDuplicateSlug($slug);

                // 새로 생성
                if ( empty($slugExist) && empty($id) ) {
                    $this->pagesRepository->create($title, $slug, $content);
                    header('Location: index.php?route=admin/pages');
                }
                else if ( !empty($slugExist) && !empty($id) ) {
                    $this->pagesRepository->update($id, $title, $slug, $content);
                    header('Location: index.php?route=admin/pages');
                }
                else {
                    $errors['duplicateSlug'] = '이미 존재하는 URL 입니다.';
                }

            }
            else {
                $errors['emptyField'] = '내용을 입력해 주세요.';
            }
        }

        $this->render('pages/create', [
            'errors' => $errors,
            'page' => !empty($page) ? $page : null,
        ]);
    }

    public function delete() {
        // 파라미터 유효성 검증
        $id = @(int) ($_POST['id'] ?? 0);
        if ( !empty($id) ) {
            $result = $this->pagesRepository->delete($id);

            // 삭제 성공 여부에 따른 리다이렉션
            if ( !empty($result) ) {
                header('Location: index.php?route=admin/pages');
            }
            else {
                $errors = ['deleteFaled' => "페이지 삭제에 실패 했습니다. (페이지 고유 번호: {$id})"];
                $this->render('pages/index', [
                    'pages' => $this->pagesRepository->fetchAll(),
                    'errors' => $errors,
                ]);
            }
        }
    }

    public function edit() {
        // 파라미터 유효성 검증
        $id = @(int) ($_GET['id'] ?? 0);

        if ( !empty($id) ) {
            // 수정할 페이지 정보 가져오기
            $result = $this->pagesRepository->fetchById($id);

            if ( !empty($result) ) {
                // 수정 페이지 렌더링
                $this->create($result);
            }
            else {
                // 수정할 페이지 정보가 없는 경우
                $errors = ['editImpossible' => "수정할 페이지가 존재하지 않습니다. (페이지 고유 번호: {$id})"];
                $this->render('pages/index', [
                    'pages' => $this->pagesRepository->fetchAll(),
                    'errors' => $errors,
                ]);
            }

        }
    }

}