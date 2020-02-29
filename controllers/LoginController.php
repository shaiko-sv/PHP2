<?php

class LoginController extends Controller {

    private $template = "login.tmpl";
    protected $content;

    public function __construct()
    {
        $this->model = new LoginModel();
        $this->view = new View();
    }


    public function index() {
        if(!empty($_POST)) {
            if(!$this->login()) {
                $this->content['error'] = "Неправильный логин или пароль";
            }
        }

        $this->content['title'] = 'Вход в личный кабинет';
        $this->view->renderTwig($this->template, $this->content);

    }

    public function login() {
        if(!$this->model->checkUser()) {
            return false;
        }
    }
}