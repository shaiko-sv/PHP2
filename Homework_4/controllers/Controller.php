<?php
    class Controller {

        public $model;
        public $view;
        protected $pageData = [];
        protected $content;

        public function __construct()
        {
            $this->model = new Model();
            $this->view = new View();
        }


    }