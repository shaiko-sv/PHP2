<?php
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
const TEMPLATES_PATH = ROOT. "/templates/";
const VENDOR_PATH = ROOT. "/vendor/";
const CONTROLLER_PATH = ROOT. "/controllers/";
const MODEL_PATH = ROOT. "/models/";
const VIEW_PATH = ROOT. "/views/";

const PHOTO = 'img/big/';
const PHOTO_SMALL = 'img/small/';

// подгружаем и активируем авто-загрузчик Twig-a
require_once VENDOR_PATH. 'autoload.php';
require_once 'DB.php';
require_once 'route.php';
require_once CONTROLLER_PATH.'Controller.php';
require_once MODEL_PATH.'Model.php';
require_once VIEW_PATH.'View.php';

Routing::buildRoute();

