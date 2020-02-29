<?php

class RegisterController extends Controller {

    private $template = "register.tmpl";
    protected $content;

    public function __construct()
    {
        $this->model = new RegisterModel();
        $this->view = new View();
    }


    public function index() {
        $this->content['image'] = '/img/icons/user-start.png';
        $this->content['title'] = 'Регистрация на сайте';

        if(!empty($_POST)) {
            if($this->register()) {
                $this->content['message'] = "Вы успешно зарегистрированны. :) Пожалуйста, авторизуйтесь...";
                $this->content['image'] = '/img/icons/user-ok.png';
            } else {
                $this->content['message'] = "Произошла ошибка во время регистрации :(";

            }
        }
        $this->view->renderTwig($this->template, $this->content);
    }

    public function register() {
        if(!empty($_POST) && !empty($_POST['fullName']) && !empty($_POST['login'])
            && !empty($_POST['email']) && !empty($_POST['password'])) {
            $regUser = $_POST['fullName'];
            $regLogin = $_POST['login'];
            $regEmail = $_POST['email'];
            $regPassword = md5($_POST['password']);
            $this->model->registerNewUser($regUser, $regLogin, $regEmail, $regPassword);
            return true;
        } else {
            $this->pageData['message'] = "Вы заполнили не все поля";

        }
    }
}