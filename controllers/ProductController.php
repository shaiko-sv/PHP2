<?php



class ProductController extends Controller {

    private $pageTpl = "product.tpl.php";

    public function __construct()
    {
        $this->model = new ProductModel();
        $this->view = new View();
        $this->pageData['id'] = $this->model->getId();
        $this->pageData['product_name'] = $this->model->getName();
        $this->pageData['price'] = $this->model->getPrice();
        $this->pageData['img'] = $this->model->getImg();
    }

    public function getPageTpl() {
        return $this->pageTpl;
    }

    /**
     * @return array
     */
    public function getPageData()
    {
        return $this->pageData;
    }

    public function index()
    {
        $id = $_GET['id']??'';
        $product = $this->model->getProductByID($id);
        $this->pageData['img'] = $this->model->getImg();
        $this->pageData['product_name'] = $this->model->getName();
        $this->pageData['price'] = $this->model->getPrice();
        $this->pageData['description'] = $this->model->getDescription();
        $this->view->render($this->getPageTpl(), $this->getPageData());
    }
}