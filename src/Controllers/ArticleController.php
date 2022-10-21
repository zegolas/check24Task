<?php
namespace App\Controllers;


class ArticleController extends BaseController
{
    public function articleForm()
    {
        if (!isset($_SESSION["user"])) {
            header("Location: index.php");
            die();
        }
        return "article_form.php";
    }

    public function save()
    {
        if (!isset($_POST["title"]) || !isset($_POST["image"]) || !isset($_POST["text"])) {
            header("Location: index.php?page=createArticle&error=1");
            die();
        }

        if (!isset($_SESSION["user"])) {
            header("Location: index.php");
            die();
        }

        $user = $_SESSION["user"];

        $stmnt = "INSERT INTO articles (title, text, image, userId, createdAt) VALUES (?,?,?,?,?)";
        $data = [
            $_POST["title"], $_POST["text"], $_POST["image"], $user["id"], date('Y-m-d H:i:s') 
        ];
        $this->persistence->insert($stmnt, $values);
    }
}