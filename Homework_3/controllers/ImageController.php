<?php

class ImageController extends Controller {

    private $pageTpl = 'image.tmpl';

    public function __construct()
    {
        $this->model = new ImageModel();
        $this->view = new View();

        $image = $this->model->getImageByID($_GET['photo']);
        $content = ['title' => 'Фото',
            'path' => PHOTO,
            'image' => $image
        ];

        $this->view->render($this->pageTpl, $content);
    }


    public function index() {

    }
//        $this->pageData['title'] = "Вход в личный кабинет";
//
//        if(!empty($_POST)) {
//            if(!$this->login()) {
//                $this->pageData['error'] = "Неправильный логин или пароль";
//            }
//        }
//
//        $this->view->render($this->pageTpl, $this->pageData);


//    public  function login() {
//        if(!$this->model->checkUser()) {
//            return false;
//        }
//    }
}
