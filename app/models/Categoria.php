<?php
class Categoria {
    private $conn;
    private $tableName = "categorias";

    public function __construct($db){
        $this->conn = $db;
    }

    public function listarCategorias(){
        $query = "select * from " . $this->tableName . " where estado_auditoria = '1' ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }

    public function ObtenerCategoria(){
        
    }

    public function insertarCategoria(){
        
    }

    public function actualizarCategoria(){
        
    }

    public function darBajaCategoria(){
        
    }
}