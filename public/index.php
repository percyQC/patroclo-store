<?php
    require_once __DIR__ . '/../app/config/Database.php';

    $database = new Database();
    $conn = $database->getConnection();

    if($conn) {
        echo "La conexion ha sido exitosa mi chamo :D";
    } else {
        echo "La conexion ha fallado mamoso :(";
    }


    echo " ----------- Hola desde index.php ---------------- ";
?>