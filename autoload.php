<?php

/*
 * Autoloader for namespace and use usage
 */
//spl_autoload_register(function ($className){
//    $path = explode('\\',$className);
//    $className = $path[count($path)-1];
//    include "classes/$className.php";
//});

spl_autoload_register("autoload");

/*
 * Autoload function
 * @dirs array of directories you have classes
 *
 * @return bool
 */
function autoload($className)
{
    $dirs = [
        'config',
        'controllers',
        'engine',
        'models',
        'views'
    ];
    $found = false;
    foreach ($dirs as $dir) {
        $fileName = __DIR__ . '/' . $dir . '/' . $className . '.php';
        if (is_file($fileName)) {

            require_once ($fileName);
            $found = true;
        }
    }
    if (!$found) {
        throw new Exception('Unable to load ' . $className);
    }
    return true;
}
