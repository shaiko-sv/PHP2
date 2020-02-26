<?php

require_once 'GalleryController.php';

class IndexController extends Controller {

    private $pageTpl = 'base.tmpl';

    public function __construct()
    {
        $this->model = new IndexModel();
        $this->view = new View();
    }


    public function index() {

        $gallery = new GalleryController();
        $content = ['title' => 'Главная',
            'content' => $gallery->index(),
        ];

        $this->view->render($this->pageTpl, $content);

    }

    public  function login() {
        if(!$this->model->checkUser()) {
            return false;
        }
    }
}