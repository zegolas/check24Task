<?php 
session_start();

require __DIR__ . '../../../vendor/autoload.php';

$page = isset($_GET["page"])?$_GET["page"]:"";
$view = "homepage.php";

$factory = new App\Factory\Factory();

switch ($page) {
    case "login":
        $view = $factory->get("user")->loginForm();
        break;
    case "loginRequest":
        $view = $factory->get("user")->login();
        break;
    case "logout":
        $view = $factory->get("user")->logout();
        break;
    case "createArticle":
        $view = $factory->get("article")->articleForm();
        break;
    case "saveArticle":
        $view = $factory->get("article")->save();
        break;
}


require(__DIR__."/../../public/layout.php");