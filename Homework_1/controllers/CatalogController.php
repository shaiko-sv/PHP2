<?php

class CatalogController extends Controller {

    private $pageTpl = "catalog.tpl.php";

//    private $template;
//    private $productList = [];
//    private $productListComplete = [];
//    private $filtered;

    public function __construct()
    {
        $this->model = new CatalogModel();
        $this->view = new View();
        $this->index();

//        $this->setUrl($url);
//        $this->setProductList($this->url);
    }

    public function index() {

        $this->pageData['products'] = $this->model->getAllProducts();
        $this->pageData['title'] = "Каталог";

        if($_FILES) {
            if($_FILES['csv']['type'] != 'application/octet-stream' || $_FILES['csv']['type'] == ''){
                $this->pageData['errors'] = "Ошибка! Возможно, данный файл имеет некорректный формат";
            } else {
                if(move_uploaded_file($_FILES['csv']['tmp-name'], UPLOAD_FOLDER. $_FILES['csv']['name'])){
                    $file = fopen($_FILES['csv']['name'], "r");
                    $row = 1;
                    while ($data = fgetcsv($file, 200, ";")) {
                        if($row == 1) {
                            $row++;
                        } else {
                            $this->model->addFromCSV($data);
                        }
                    }
                    fclose($file);
                    $this->model->getAllProducts();
                }
            }
        }
    }

    public function getPageTpl()
    {
        return $this->pageTpl;
    }

    /**
     * @return array
     */
    public function getPageData()
    {
        return $this->pageData;
    }

    public function editCatalog() {
        print_r($_SESSION);
        if(!$_SESSION['user']) {
            header("Location: /");
        }

    }
//    /**
//     * @param mixed $url
//     */
//    public function setUrl($url)
//    {
//        $this->url = $url;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getUrl()
//    {
//        return $this->url;
//    }
//
//    /**
//     * @param array $productList
//     */
//    public function setProductList($productList)
//    {
//        $this->productList = $productList;
//    }
//
//    /**
//     * @return array
//     */
//    public function getProductList()
//    {
//        return $this->productList;
//    }
//
//    /**
//     * @param array $productListComplete
//     */
//    public function setProductListComplete($productListComplete)
//    {
//        $this->productListComplete = $productListComplete;
//    }
//
//    /**
//     * @return array
//     */
//    public function getProductListComplete()
//    {
//        return $this->productListComplete;
//    }
//
//    /**
//     * @param mixed $filtered
//     */
//    public function setFiltered($filtered)
//    {
//        $this->filtered = $filtered;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getFiltered()
//    {
//        return $this->filtered;
//    }
//
//    public function filter($value) {
//
//    }

}