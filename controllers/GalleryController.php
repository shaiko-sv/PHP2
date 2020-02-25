<?php

require_once MODEL_PATH. "GalleryModel.php";

class GalleryController extends Controller {

    private $pageTpl = 'gallery.tmpl';

    public function __construct()
    {
        $this->model = new GalleryModel();
        $this->view = new View();
    }


    public function index() {

        $message = '';
        if (isset($_POST['send'])) {
            if ($_FILES['userFile']['error']) {
                $message =  'Ошибка загрузки файла!';
            } elseif ($_FILES['userFile']['size'] > 1000000) {
                $message = 'Файл слишком большой';
            } elseif (
                $_FILES['userFile']['type'] == 'image/jpeg'||
                $_FILES['userFile']['type'] == 'image/png' ||
                $_FILES['userFile']['type'] == 'image/gif'
            ) {
                if (copy($_FILES['userFile']['tmp_name'], PHOTO.$this->model->translit($_FILES['userFile']['name']))) {
                    $path = PHOTO_SMALL.$this->model->translit($_FILES['userFile']['name']);
                    $name = explode('.', $_FILES['userFile']['name'])[0];
                    $name = $this->model->translit($name);
                    $ext = explode('.', $_FILES['userFile']['name'])[1];
                    $type = explode('/', $_FILES['userFile']['type'])[1];
                    $this->model->resizeImage(150, 150, $_FILES['userFile']['tmp_name'], $path, $type);
                    $this->model->addImageToDB($name, $ext);
                } else {
                    $message =  'Ошибка загрузки файла!';
                }
            } else {
                $message =  'Не правильный тип файла!';
            }
        }

        $images = $this->model->getAllImages_PDO();
        $content = ['title' => 'Фото галлерея',
            'path' => PHOTO_SMALL,
            'images' => $images,
            'message' => $message
        ];

        $this->view->render($this->pageTpl, $content);
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

    public function addPhoto() {

    }

    public  function login() {
        if(!$this->model->checkUser()) {
            return false;
        }
    }

}