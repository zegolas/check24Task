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

        $stmntComment = "SELECT * FROM comments WHERE articleId = ?";
        $dataComment = [
            $id
        ];
        $itemsComment = $this->persistence->select($stmntComment, $dataComment);
        $items[0]["comments"] = $itemsComment;
        return ["article.php", $items[0]];
    }

    public function list()
    {
        $page = isset($_GET["pag"]) && is_numeric($_GET["pag"]) && $_GET["pag"] > 0? $_GET["pag"] : 1;
        $limitStart = ($page - 1) * 3;
        $stmnt = "SELECT * FROM articles ORDER BY createdAt desc limit ?, 3";
        $data = [
            $limitStart
        ];
        $items = $this->persistence->select($stmnt, $data);

        $stmntCount = "SELECT count(*) as count FROM articles;";
        $count = $this->persistence->select($stmntCount);
        $total = $count[0]["count"];
        return ["homepage.php", $items, $total];
    }

    public function saveComment()
    {
        if (!isset($_GET["id"])) {
            $this->redirect("index.php?error=2");
        }
        if (!isset($_POST["name"]) || !isset($_POST["text"]) || 
            $_POST["name"] == "" || $_POST["text"] == "" ) {
            $this->redirect("index.php?page=article&error=1&id=".$_GET["id"]);
        }

        if (!isset($_SESSION["user"])) {
            $this->redirect("index.php");
        }

        $user = $_SESSION["user"];

        $stmnt = "INSERT INTO comments (name, comment, mail, userId, createdAt, articleId) VALUES (?,?,?,?,?,?)";
        $values = [
            $_POST["name"], $_POST["text"], $_POST["mail"], $user["id"], date('Y-m-d H:i:s'), $_GET["id"]
        ];
        $id = $this->persistence->insert($stmnt, $values);

        $this->redirect("index.php?page=article&id=".$_GET["id"]);
    }

}