<?php 
namespace App\Message;

class Message
{
    private static $instance = null;

    private $messages = [];

    protected function __construct() { }

    public static function getInstance() : Message
    {
        if (self::$instance == null)
            self::$instance = new Message();
        return self::$instance;
    }

    function push(string $message)
    {
        $this->messages[] = $message;
    }

    function pull()
    {
        $messagesLocal = $this->messages;
        $this->message = [];
        return $messagesLocal;
    }
}