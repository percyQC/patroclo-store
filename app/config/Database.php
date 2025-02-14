<?php
class Database {
    private $host = "localhost";
    private $database = "patroclo_store";
    private $user = "root";
    private $password = "123456";

    public $conn;

    public function getConnection(){
        $this->conn = null;
        try {
        $connString = "mysql:host={$this->host};dbname={$this->database}";
        $this->conn = new PDO(
            $connString,
            $this->user,
            $this->password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        
        );
        }catch (\Throwable $th) {
            echo "Error de conexion: " . $th->getMessage();
        }
        return $this->conn;

    }
}
