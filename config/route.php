<?php
/*
 * Класс маршрутизации
 * url http://localhost/
 * url http://localhost/cabinet
 * url http://localhost/cabinet/users/
 * url http://localhost/cabinet/users/userId=
 * url http://localhost/cabinet/orders/
 * url http://localhost/cabinet/orders?orderId=
 */
class Routing {

    public static function buildRoute() {
        /* Контроллер и action по умолчанию */
         $controllerName = "IndexController";
         $modelName = "IndexModel";
         $action = "index";

         $route = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
//         echo "Router.php Line 20 ";
//         print_r($route);
//         echo "<br>";

         $i = count($route)-1;
         while ($i>0) {
             if($route[$i] != '') {
//                 echo "Router.php Line 28 ";
//                 print_r($_GET);
//                 echo "<br>";
                 // if(is_file(CONTROLLER_PATH.ucfirst($route[$i]). "Controller.php") || !empty($_GET)) {
                 if(is_file(CONTROLLER_PATH.ucfirst($route[$i]). "Controller.php")) {
                     $controllerName = ucfirst(($route[$i]). "Controller");
                     $modelName = ucfirst($route[$i]). "Model";
                     break;
                 } else {
                     $action = $route[$i];
                 }
             }
             $i--;
         }

         require_once CONTROLLER_PATH . $controllerName . ".php"; // IndexController.php
         require_once MODEL_PATH . $modelName . ".php"; // IndexModel.php

         if ($controllerName === 'IndexController') {
             require_once CONTROLLER_PATH . "ProductController.php";
             require_once MODEL_PATH . "ProductModel.php";
             require_once CONTROLLER_PATH . "CatalogController.php";
             require_once MODEL_PATH . "CatalogModel.php";
         }

         $controller = new $controllerName();
//         echo "Router.php Line 44 $controllerName $action<br>";
         $controller->$action(); // $controller->index()

//         /* Определяем контроллер */
//        if($route[1] != '') {
//            $controllerName = ucfirst($route[1] . "Controller");
//            $modelName = ucfirst($route[1] . "Model");
//        }
//
//        include CONTROLLER_PATH . $controllerName . ".php"; // IndexController.php
//        include MODEL_PATH . $modelName . ".php"; // IndexModel.php
//
//        if(isset($route[2]) && $route[2] != ''){
//            $action = $route[2];
//        }
//
//        $controller = new $controllerName();
//        $controller->$action(); // $controller->index()
    }

    public function errorPage() {

    }
    }