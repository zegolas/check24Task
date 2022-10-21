<?php
namespace App\Controllers;

use App\Persistence\Persistence;
use App\Message\Message;

class BaseController
{
    protected Persistence $persistence;

    protected Message $messages;

    protected $errorList = [];

    function __construct($persistence)
    {
        $this->persistence = $persistence;
        $this->messages = Message::getInstance();
    }

    protected function redirect(string $url)
    {
        header("Location: $url");
        die();
    }

    protected function validateErrors()
    {
        if (!isset($_GET["error"]) || !isset($this->errorList[$_GET["error"]])) {
            return;
        }
        $this->messages->push($this->errorList[$_GET["error"]]);
    }
    
}
