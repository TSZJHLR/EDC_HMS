<?php

class Database {
    private $host = 'localhost';
    private $dbName = 'electronic_data_capture';
    private $username = 'root';
    private $password = 'root';
    private $port = '8889';
    private $connection;
    
    public function connect() {
        $this->connection = null;
        
        try {
            $this->connection = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->dbName . ";port=" . $this->port,
                $this->username,
                $this->password
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
        
        return $this->connection;
    }
}

?>