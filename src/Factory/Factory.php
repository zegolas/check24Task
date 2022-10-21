<?php 
namespace App\Factory;

use App\Persistence\Persistence;
use App\Controllers\UserController;
use App\Controllers\ArticleController;


class Factory
{
    private $classDefinition = [];
    private $persistence;

    function __construct($config)
    {
        $this->persitence = new Persistence($config);
        $this->classDefinition = [
            "user" => function($persitence) { 
                
                return new UserController($persitence); 
            },
            "article" => function($persitence) { 
                return new ArticleController($persitence); 
            }
        ];
    }

    function get(string $class)
    {
        if (!isset($this->classDefinition[$class]))
            throw new \exception("invalid class ".$class);
        return $this->classDefinition[$class]($this->persitence);
    }
}