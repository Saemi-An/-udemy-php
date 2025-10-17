<?php

namespace App\Admin\Controller;

use App\Frontend\Controller\AbstractController;

class PagesAdminController extends AbstractAdminController {
    
    public function index() {
        $this->error404();
        // $this->render('pages/index', []);
    }
    
}