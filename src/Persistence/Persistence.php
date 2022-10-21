<?php
namespace App\Persistence;

use App\Persistence\Adapters\MysqlAdapter;
use App\Persistence\Adapters\IAdapter;

class Persistence
{
    private IAdapter $adapter;

    function __construct($config)
    {
        $this->adapter = new MysqlAdapter();
        $this->adapter->connect($config["serverName"], $config["username"], $config["password"], $config["db"]);
    }

    function insert($statement, $values)
    {
        return $this->adapter->insert($statement, $values);
    }

    function select($statement, $values = [])
    {
        return $this->adapter->select($statement, $values);
    }
}