<?php

class Database {
    private $host = 'localhost:3307';
    private $db   = '';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';
    private $connection;

    public function __construct() {
        $this->connect();
    }

    public function connect() {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";

        try {
            $this->connection = new PDO($dsn, $this->user, $this->pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Databaseverbinding is gelukt.";
        } catch (PDOException $e) {
            die("Databaseverbinding mislukt: " . $e->getMessage());
        }
    }

    public function closeConnection() {
        $this->connection = null;
    }
}


?>
