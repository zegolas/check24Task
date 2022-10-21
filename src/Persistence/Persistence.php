<?php
namespace App\Persistence;

use App\Persistence\Adapters\MysqlAdapter;
use App\Persistence\Adapters\IAdapter;

class Persistence
{
    private IAdapter $adapter;

    function __construct()
    {
        $this->adapter = new MysqlAdapter();
        $this->adapter->connect();
    }

    function insert($statement, $values)
    {
        $this->adapter->insert($statement, $values);
    }

    function select($statement, $values = [])
    {
        return $this->adapter->select($statement, $values);
    }
}