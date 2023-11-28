<?php

class Data
{
    private $host, $username, $password, $dbname, $dsn, $pdo;

    public function __construct()
    {
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "universidad";
        $this->dsn = "mysql:host=$this->host;dbname=$this->dbname";
    }
    public function connect()
    {
        $options = [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION];
        try {
            $this->pdo = new PDO($this->dsn, $this->username, $this->password, $options);
            return $this->pdo;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
