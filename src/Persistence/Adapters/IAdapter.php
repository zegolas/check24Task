<?php
namespace App\Persistence\Adapters;

interface IAdapter
{
    function connect();
    function insert($statement, $values);
    function select($statement, $values = []);
}