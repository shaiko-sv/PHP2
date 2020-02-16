<?php
session_start();

define("ROOT", $_SERVER['DOCUMENT_ROOT']);
const CONTROLLER_PATH = ROOT. "/controllers/";
const MODEL_PATH = ROOT. "/models/";
const VIEW_PATH = ROOT. "/views/";
const TEMPLATES_PATH = ROOT. "/templates/";

require_once "DB.php";
require_once "route.php";
require_once CONTROLLER_PATH. 'Controller.php';
require_once MODEL_PATH. 'Model.php';
require_once VIEW_PATH. 'View.php';

const COMPANY_NAME_SHORT = "Shop";
const COMPANY_NAME_FULL = "Ice Cream Shop";

//Scripts
const JS_FOLDER = "/public/js/";
const JS = "main.js";
const JQUERY_UNCOMPRESSED = 'https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"';
const JQUERY_MINIFIED = 'https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"';
const VUEJS_DEV = "https://cdn.jsdelivr.net/npm/vue/dist/vue.js";
const VUEJS_PROD = "https://cdn.jsdelivr.net/npm/vue";

//Style
const CSS_FOLDER = "/public/css/";
const CSS_NORMALIZE = "normalize.css";
const CSS_MAIN = "style.css";

//Packages
const BOOTSTRAP_CSS = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css";
const BOOTSTRAP_JQUERY = "https://code.jquery.com/jquery-3.4.1.slim.min.js";
const BOOTSTRAP_POPPER = "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js";
const BOOTSTRAP_JS = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js";

//Images
const ICON = "favicon.png";

//Fonts
const FONTAWASOME_JS = 'https://kit.fontawesome.com/ab97d34a37.js" crossorigin="anonymous"';
const FA_PREFIX = "fas";
const FA_BRAND = "fab";

//Site:
//language
const LANG = "en";
//Charset
const CHARSET = "utf-8";
//images folder
const IMAGES_FOLDER = "/public/img/";

Routing::buildRoute();