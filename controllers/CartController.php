<?php

class CartController extends Controller {

    private $template = "cart.tmpl";
    protected $content;

    public function __construct()
    {
        $this->model = new CartModel();
        $this->view = new View();
    }


    public function index()
    {
        $this->content['title'] = 'Корзина';
        $this->view->renderTwig($this->template, $this->content);
    }

    public function loadCart()
    {
        $id_cart = $_GET['id_cart']??'';
        echo $this->model->ajaxRequest($id_cart);
        exit;
    }

    public function addToCart()
    {
        $productID = $_GET['id_product']??'';
        $result = $this->model->addToCart($productID);
        echo json_encode(['result' => $result]);
        exit;
    }

    public function removeFromCart()
    {
        $productID = $_GET['id_product']??'';
        $result = $this->model->removeFromCart($productID);
        echo json_encode(['result' => $result]);
        exit;
    }
}