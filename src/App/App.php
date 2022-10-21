<?php 
session_start();

require __DIR__ . '../../../vendor/autoload.php';
require "Config.php";

$page = isset($_GET["page"])?$_GET["page"]:"homepage";
$view = "homepage.php";
$data = null;

$factory = new App\Factory\Factory($config);

switch ($page) {
    case "login":
        $view = $factory->get("user")->loginForm();
        break;
    case "loginRequest":
        $factory->get("user")->login();
        break;
    case "logout":
        $factory->get("user")->logout();
        break;
    case "createArticle":
        $view = $factory->get("article")->articleForm();
        break;
    case "saveArticle":
        $factory->get("article")->save();
        break;
    case "article":
        list($view, $data) = $factory->get("article")->get();
        break;
    case "homepage":
        list($view, $data) = $factory->get("article")->list();
        break;
    default:
        $view = "not_found.php";
        break;
}

$messages = App\Message\Message::getInstance()->pull();

require(__DIR__."/../../public/layout.php");