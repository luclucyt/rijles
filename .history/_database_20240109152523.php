<?php

namespace App;

class Database
{
    public $conn;
    private $serverName = "localhost";
    private $username = "LucasDatabase";
    private $password = "LucasDatabase";
    private $dbName = "rijles";
    public function __construct()
    {
        $this->conn = new mysqli($this->serverName, $this->username, $this->password, $this->dbName);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function cleanData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = $this->conn->real_escape_string($data);
        return $data;
    }

    public function query($sql)
    {
        $result = $this->conn->query($sql);
        return $result;
    }

    public function close()
    {
        $this->conn->close();
    }
}

$db = new Database();
session_start();
