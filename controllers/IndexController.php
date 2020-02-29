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

        $catalog = new CatalogController();
        $this->pageData['contents'] = [$catalog];
        $this->pageData['footers'] = [];

        $this->pageData['js'] = [JS_VUE_ERROR, JS_VUE, JS_MAIN,];
        $this->pageData['js_foot'] = [ANGULAR_MINIFIED, ANGULAR_ROUTE, VUEJS_DEV];

        $this->view->render($this->pageTpl, $this->pageData);
    }
}