<?php
namespace App\Controllers;

use App\Persistence\Persistence;

class UserController extends BaseController
{
    public function loginForm()
    {
        return "login.php";
    }

    public function login()
    {
        if (!isset($_POST["username"]) || !isset($_POST["password"])) {
            header("Location: index.php?page=login&error=1");
            die();
        }
        $username = $_POST["username"];
        $password = $_POST["password"];
        $stmnt = "SELECT * FROM users WHERE username = ? && password = ?";
        $data = [
            $username, md5($password)
        ];
        echo md5($password);
        $items = $this->persistence->select($stmnt, $data);
        if (count($items) == 0){
            header("Location: index.php?page=login&error=1");
            die();
        }
            
        
        $_SESSION["user"] = $items[0];
        header("Location: index.php");
        die();
    }

    public function logout()
    {
        unset($_SESSION["user"]);
        header("Location: index.php");
        die();
    }
}