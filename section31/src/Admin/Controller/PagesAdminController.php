<?php

namespace App\Admin\Controller;

use App\Frontend\Controller\AbstractController;
use App\Repository\PagesRepository;
use App\Helper\Container;

class PagesAdminController extends AbstractAdminController {

    public function __construct(private PagesRepository $pagesRepository) {}

    public function index() {
        // $this->error404();

        $this->render('pages/index', [
            'pages' => $this->pagesRepository->fetchAll(),
        ]);
    }
    
    public function create() {
        // 예외 처리 셋업
        $errors = [];
        
        // POST 요청 확인
        if ( !empty($_POST) ) {
        
            $title = @(string) ($_POST['title'] ?? '');
            $slug = @(string) ($_POST['slug'] ?? '');
            $content = @(string) ($_POST['content'] ?? '');

            // slug 유효성 검사
            $slug = strtolower($slug);
            $slug = str_replace(['/', ' ', '.'], ['-', '-', '-'], $slug);
            $slug = preg_replace('/[^a-z0-9\-]/', '', $slug);   // 알파벳 소문자, 숫자, -가 아닌 모든 것들을 삭제

            // 필드값 존재하는지 확인
            if ( !empty($title) && !empty($slug) && !empty($content) ) {

                // slug 중복 없는지 확인
                $slugExist = $this->pagesRepository->checkDuplicateSlug($slug);
                if ( empty($slugExist) ) {
                    $this->pagesRepository->create($title, $slug, $content);
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
        ]);
    }
}