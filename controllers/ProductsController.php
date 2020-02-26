<?php

class ProductsController extends Controller {

    private $pageTpl = "products.tpl.php";

    public function __construct() {
        $this->model = new ProductsModel();
        $this->view = new View();
    }

    public function index() {
        if(!$_SESSION['user']) {
            header("Location: /login");
        }
        $this->pageData['user'] = $_SESSION['user'];
        $this->pageData['products'] = $this->model->getAllProducts();
        $this->pageData['title'] = "Товары";
//        $ordersCount = $this->model->getOrdersCount();
//        $this->pageData['ordersCount'] = $ordersCount;
        $this->pageData['ordersCount'] = 0; //TODO: внести таблицу orders в базу данных shop

        $productsCount = $this->model->getProductsCount();
        $this->pageData['productsCount'] = $productsCount;

        $usersCount = $this->model->getUserCount();
        $this->pageData['usersCount'] = $usersCount;
        $this->view->render($this->pageTpl, $this->pageData);

        if($_FILES) {
            if($_FILES['csv']['type'] != 'text/csv' || $_FILES['csv']['type'] == '') {
                $this->pageData['errors'] = "Ошибка! Возможно данный файл имеет некорректный формат";
            } else {
                if(move_uploaded_file($_FILES['csv']['tmp_name'],UPLOAD_FOLDER.$_FILES['csv']['name'])) {
                    $file = fopen(UPLOAD_FOLDER.$_FILES['csv']['name'], "r");
                    $row = 1;
                    while($data = fgetcsv($file, 200, ";")) {
                        if($row == 1) {
                            $row++;
                            continue;
                        } else {
                            echo "ProductsController line 41 ";
                            print_r($data);
                            $this->model->addFromCSV($data);
                        }
                    }
                    fclose($file);
                    $this->model->getAllProducts();
                }
            }
        }

    }

}
