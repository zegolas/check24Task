<?php
namespace App\Controllers;

use App\Persistence\Persistence;

class BaseController
{
    protected Persistence $persistence;

    function __construct($persistence)
    {
        $this->persistence = $persistence;
    }
    
}
