<?php

class database
{
    private $host = "localhost";
    private $db_name = "shopping_cart";
    private $username = "root";
    private $password = "root";
    public $conn;

    //=== Connect To Database Function ===
    public function dbConnect()
    {
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
    //=== End Function ===

    //=== Close PDO DB Connection Function ===
    function __destruct() {
        $this->conn = null;
    }
    //=== End Function ===


}

?>