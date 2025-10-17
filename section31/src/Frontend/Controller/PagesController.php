<?php

namespace App\Frontend\Controller;

use App\Repository\PagesRepository;

class PagesController extends AbstractController{

    public function __construct(PagesRepository $pagesRepository) {
        parent::__construct($pagesRepository);
    }

    public function showPage(string $pageKey) {
        // $pageKey는 'index' 혹은 'slug'

        $page = $this->pagesRepository->fetchBySlug($pageKey);

        if ( empty($page) ) {
            $this->error404();
            return;
        }
        else {

        }

        $this->render('pages/showPage', [
            'page' => $page
        ]);
    }

}