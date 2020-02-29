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

/**
 * @param $className
 * @return bool
 * @throws Exception
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
            ChromePhp::log('autoload.php line 36: ', $fileName, ' ', $found);
            break; // добавил для оптимизации поиска
        }
        ChromePhp::log('autoload.php line 39: ', $fileName, ' ', $found);
    }
    if (!$found) {
        throw new Exception('Unable to load ' . $className);
    }
    return true;
}
