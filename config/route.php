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

/**
 * Class Routing
 */
class Routing {

    public static function buildRoute() {
        /* Контроллер и action по умолчанию */
         $controllerName = "IndexController";
         $action = "index";

         $route = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

         $i = count($route)-1;
         while ($i>0) {
             if($route[$i] != '') {
                 if(is_file(CONTROLLER_PATH.ucfirst($route[$i]). "Controller.php")) {
                     $controllerName = ucfirst(($route[$i]). "Controller");
                     break;
                 } else {
                     $action = $route[$i];
                 }
             }
             $i--;
         }
         ChromePhp::log('Routing line 37 Controller = ' . $controllerName . ', action = ' . $action . '()' );
         $controller = new $controllerName();
         $controller->$action();
    }
}