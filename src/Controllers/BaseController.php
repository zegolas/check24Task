<?php
namespace App\Controllers;

use App\Persistence\Persistence;

class BaseController
{
    protected Persistence $persistence;

    function __construct()
    {
        $this->persistence = new Persistence();
    }
}
