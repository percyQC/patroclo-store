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
        require __DIR__ . '/../views/categorias/index.php';
    }

    public function viewInsertar(){
        require __DIR__ . '/../views/categorias/insertar.php';
    }

    public function insertar($request){
        $this->categoriaModel->insertarCategoria($request);
        header('Location:/public?controller=Categoria');
    }
    
    public function viewActualizar(){
        $idCategoria=isset($_GET['idCategoria']) ? $_GET['idCategoria'] : '0';
        $categoria = $this->categoriaModel->ObtenerCategoria($idCategoria);
        require __DIR__ . '/../views/categorias/actualizar.php';
    }

    public function actualizar($request){
        $this->categoriaModel->actualizarCategoria($request);
        header('Location:/public?controller=Categoria');
    }

    public function darBaja(){
        $idCategoria=isset($_GET['idCategoria']) ? $_GET['idCategoria'] : '0';
        $this->categoriaModel->darBajaCategoria($idCategoria);
        header('Location:/public?controller=Categoria');
    }
}