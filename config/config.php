<?php
session_start(); // Включаем сессию для пользователя

// Определяем константы путей к контроллерам, моделям и пр.
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
const CONTROLLER_PATH = ROOT. "/controllers/";
const MODEL_PATH = ROOT. "/models/";
const VIEW_PATH = ROOT. "/views/";
const TEMPLATES_PATH = ROOT. "/views/";
const UPLOAD_FOLDER = ROOT. "/uploads/";
const VENDOR_PATH = ROOT. "/vendor/";

// подгружаем и активируем авто-загрузчик Twig-a
require_once VENDOR_PATH . 'autoload.php';

require_once "DB.php";
require_once "dbPDO.php";
require_once "route.php";

// название компании длинное и короткое
const COMPANY_NAME_SHORT = "Shop";
const COMPANY_NAME_FULL = "Ice Cream Shop";

// Scripts
const JS_FOLDER = "js/";
const JS_MAIN = "main.js";
const JS_VUE = "ProductsComponent.js";
const JS_VUE_ERROR = "ErrorComponent.js";
const JQUERY_UNCOMPRESSED = 'https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"';
const JQUERY_MINIFIED = 'https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"';
const VUEJS_DEV = "https://cdn.jsdelivr.net/npm/vue/dist/vue.js";
const VUEJS_PROD = "https://cdn.jsdelivr.net/npm/vue";
const ANGULAR_MINIFIED = 'https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/angular.min.js';
const ANGULAR_ROUTE = 'https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/angular-route.min.js';

// Style
const CSS_FOLDER = "css/";
const CSS_NORMALIZE = "normalize.css";
const CSS_MAIN = "style.css";

// Packages
const BOOTSTRAP_CSS = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css";
const BOOTSTRAP_JQUERY = "https://code.jquery.com/jquery-3.4.1.slim.min.js";
const BOOTSTRAP_POPPER = "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js";
const BOOTSTRAP_JS = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js";

// Images
const ICON = "favicon.png";

// Fonts
const FONTAWASOME_JS = 'https://kit.fontawesome.com/ab97d34a37.js" crossorigin="anonymous"';
const FA_PREFIX = "fas";
const FA_BRAND = "fab";

//Site:
//language
const LANG = "en";
//Charset
const CHARSET = "utf-8";
//images folder
const IMAGES_FOLDER = "img/";

// запускаем роутер
Routing::buildRoute();