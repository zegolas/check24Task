<?php
namespace App\Persistence\Adapters;

class MysqlAdapter implements IAdapter
{
    private string $servername = "localhost";
    private string $username = "root";
    private string $password = "";
    private string $dbname = "check24";
    private $conn;

    function connect()
    {
        $this->conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            throw new Exception("Could not connect to database");
        } 
    }

    function insert($statement, $values)
    {
        $stmt = $this->conn->prepare($statement);
        $stmt->bind_param(str_repeat('s', count($values)), ...$values);
        $stmt->execute();
        $id = $stmt->insert_id;
        $stmt->close();
        return $id;
    }


    function select($statement, $values = [])
    {
        $stmt = $this->conn->prepare($statement);
        if (count($values) > 0)
            $stmt->bind_param(str_repeat('s', count($values)), ...$values);
        
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}