<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/basedata/Data.php");

class Login
{
    private $connection;

    public function __construct()
    {
        $data = new Data();
        $this->connection = $data->connect();
    }
    public function login()
    {
        $data = "SELECT * FROM maestros where email, contrasena";
    }
}