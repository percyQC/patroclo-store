<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Categoria.php';

class CategoriaController {
    private $db;
    private $categoriaModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->categoriaModel = new Categoria($this->db);
    }

    public function index(){
        $categorias = $this->categoriaModel->listarCategorias();
        require_once __DIR__ . '/../views/categorias/index.php';
    }
}