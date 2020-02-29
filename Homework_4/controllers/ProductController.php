<?php



class ProductController extends Controller {

    private $pageTpl = "product.tpl.php";

    public function __construct($id)
    {
        $this->model = new ProductModel($id);
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

}