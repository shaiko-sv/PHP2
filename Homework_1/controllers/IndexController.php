<?php

class IndexController extends Controller {

    private $pageTpl = "base.tpl.php";

    public function __construct()
    {
        $this->model = new IndexModel();
        $this->view = new View();
    }


    public function index() {
        $this->pageData['title'] = COMPANY_NAME_FULL;
        $this->pageData['styles'] = [CSS_NORMALIZE, CSS_MAIN];
        $this->pageData['js_head'] = [JQUERY_UNCOMPRESSED];

        $this->pageData['headers'] = [VIEW_PATH. "header.tpl.php",];
        $this->pageData['navs'] = [];

        $product1 = new ProductController(1);
        $product2 = new ProductController(2);
        $product3 = new ProductController(3);
        $product4 = new ProductController(4);
        $this->pageData['contents'] = [$product1,$product2,$product3,$product4];
        $this->pageData['footers'] = [];

        $this->pageData['js'] = [JS];

//        if(!empty($_POST)) {
//            if(!$this->login()) {
//                $this->pageData['error'] = "Неправильный логин или пароль";
//            }
//        }

        $this->view->render($this->pageTpl, $this->pageData);

    }

    public  function login() {
        if(!$this->model->checkUser()) {
            return false;
        }
    }
}