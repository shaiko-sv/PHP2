<?php

class OrderController extends Controller {

    private $template = "order.tmpl";
    protected $content;

    public function __construct()
    {
        $this->model = new OrderModel();
        $this->view = new View();
    }


    public function index()
    {
        $this->content['cartItems'] = $this->model->getCartItems(1);
        $this->content['title'] = 'Корзина';
        print_r($this->content);
        $this->view->renderTwig($this->template, $this->content);
    }

    public function loadCart()
    {
        $id_cart = $_GET['id_cart']??'';
        echo $this->model->ajaxRequest($id_cart);
        exit;
    }
}