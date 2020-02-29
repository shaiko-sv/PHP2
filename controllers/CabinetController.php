<?php

class CabinetController extends Controller {

    private $pageTpl = 'cabinet.tpl.php';

    public function __construct()
    {
        $this->model = new CabinetModel();
        $this->view = new View();
    }

    public function index() {

        if(!$_SESSION['user']){
            header("Location: /login");
        }
        $this->pageData['user'] = $_SESSION['user'];
        $this->pageData['title'] = "Кабинет";

//        $ordersCount = $this->model->getOrdersCount();
//        $this->pageData['ordersCount'] = $ordersCount;
        $this->pageData['ordersCount'] = 0; //TODO: внести таблицу orders в базу данных shop

        $productsCount = $this->model->getProductsCount();
        $this->pageData['productsCount'] = $productsCount;

        $usersCount = $this->model->getUserCount();
        $this->pageData['usersCount'] = $usersCount;

//        $orders = $this->model->getOrders();
//        $this->pageData['orders'] = $orders;

        $this->view->render($this->pageTpl, $this->pageData);
    }

    public function login() {
        $this->pageData['title'] = "Личный кабинет";
        $this->view->render($this->pageTpl, $this->pageData);
    }

    public function logout() {
        session_destroy();
        header("Location: /");
    }
}