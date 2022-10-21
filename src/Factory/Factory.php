<?php 
namespace App\Factory;

use App\Controllers\UserController;
use App\Controllers\ArticleController;

class Factory
{
    private $classDefinition = [];

    function __construct()
    {
        $this->classDefinition = [
            "user" => function() { return new UserController(); },
            "article" => function() { return new ArticleController(); }
        ];
    }

    function get(string $class)
    {
        if (!isset($this->classDefinition[$class]))
            throw new \exception("invalid class ".$class);
        return $this->classDefinition[$class]();
    }
}