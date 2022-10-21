<?php
namespace App\Controllers;


class ArticleController extends BaseController
{
    function __construct($persistence)
    {
        parent::__construct($persistence);
        $this->errorList = [
            1 => "Please fill all the fields",
            2 => "Post not found",
        ];
        $this->validateErrors();
    }

    public function articleForm()
    {
        if (!isset($_SESSION["user"])) {
            $this->redirect("index.php");
        }
        return "article_form.php";
    }

    public function save()
    {
        if (!isset($_POST["title"]) || !isset($_POST["image"]) || !isset($_POST["text"]) || 
            $_POST["title"] == "" || $_POST["image"] == "" || $_POST["text"] == "") {
            $this->redirect("index.php?page=createArticle&error=1");
        }

        if (!isset($_SESSION["user"])) {
            $this->redirect("index.php");
        }

        $user = $_SESSION["user"];

        $stmnt = "INSERT INTO articles (title, text, image, userId, createdAt) VALUES (?,?,?,?,?)";
        $values = [
            $_POST["title"], $_POST["text"], $_POST["image"], $user["id"], date('Y-m-d H:i:s') 
        ];
        $id = $this->persistence->insert($stmnt, $values);

        $this->redirect("index.php?page=article&id=".$id);
    }

    public function get()
    {
        if (!isset($_GET["id"])) {
            $this->redirect("index.php?error=2");
        }

        $id = $_GET["id"];
        $stmnt = "SELECT * FROM articles WHERE id = ?";
        $data = [
            $id
        ];
        $items = $this->persistence->select($stmnt, $data);
        if (count($items) == 0) {
            $this->redirect("index.php?error=2");
        }

        return ["article.php", $items[0]];
    }

    public function list()
    {
        $stmnt = "SELECT * FROM articles ORDER BY createdAt desc limit 3";
        $items = $this->persistence->select($stmnt);
        return ["homepage.php", $items];
    }
}