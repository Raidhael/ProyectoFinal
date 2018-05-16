<?php
require_once '../conexiones/conexion-global.php';
if (isset($_POST['id']) && $_POST['id'] != null){
    
    $pelicula = $conexion->prepare('SELECT * FROM pelicula WHERE id_pelicula = :id;');
    $pelicula->bindParam(':id',$_POST['id']);
    $pelicula->execute();
    $pelicula = $pelicula->fetch(PDO::FETCH_ASSOC);
    echo json_encode($pelicula);
}


?>