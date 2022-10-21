<?php
namespace App\Persistence\Adapters;

interface IAdapter
{
    function connect($servername, $username, $password, $dbname);
    function insert($statement, $values);
    function select($statement, $values = []);
}