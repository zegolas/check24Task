<?php
namespace App\Controllers;

use App\Persistence\Persistence;

class UserController extends BaseController
{
    function __construct($persistence)
    {
        parent::__construct($persistence);
        $this->errorList = [
            1 => "Please fill the username and password",
            2 => "Invalid username or password",
        ];
        $this->validateErrors();
    }

    public function loginForm()
    {
        if (isset($_SESSION["user"]))
            $this->redirect("index.php");
        return "login.php";
    }

    public function login()
    {
        if (!isset($_POST["username"]) || !isset($_POST["password"]) || $_POST["username"] == "" || $_POST["password"] == "") {
            $this->redirect("index.php?page=login&error=1");
        }

        /**
         * Validate recaptcha for login form 
         * 
        $recaptcha = new \ReCaptcha\ReCaptcha("6LfuRpwiAAAAAP4Jf40ej5wztnoV2W77fWvBtD7q");
        $resp = $recaptcha->setExpectedHostname('recaptcha-demo.appspot.com')
                        ->verify($_POST["token"], $_SERVER['REMOTE_ADDR']);

        if(!$resp->isSuccess()) {
            die(print_r($resp->getErrorCodes()));
        }*/
        
        $username = $_POST["username"];
        $password = $_POST["password"];
        $stmnt = "SELECT * FROM users WHERE username = ? && password = ?";
        $data = [
            $username, md5($password)
        ];
        echo md5($password);
        $items = $this->persistence->select($stmnt, $data);
        if (count($items) == 0){
            header("Location: index.php?page=login&error=2");
            die();
        }
            
        
        $_SESSION["user"] = $items[0];
        header("Location: index.php");
        die();
    }

    public function logout()
    {
        unset($_SESSION["user"]);
        $this->redirect("index.php");
    }
}