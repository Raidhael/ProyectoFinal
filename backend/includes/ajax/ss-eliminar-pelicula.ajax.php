
<?php

if (isset($_POST['id']) && $_POST['id'] != null && is_numeric($_POST['id'])){
    print_r($_POST);
    require_once '../conexiones/conexion-global.php';
    $sql = $conexion->prepare('SELECT count(*) FROM pelicula WHERE id_pelicula = :id;');
    $sql->bindParam(':id', $_POST['id']);
    $sql->execute();
    $existe = $sql->fetch(PDO::FETCH_NUM)[0];

    if ( $existe > 0 ) {
        $sql = $conexion->prepare('DELETE FROM pelicula  WHERE id_pelicula = :id;');
        $sql->bindParam(':id', $_POST['id']);
        if ($sql->execute())
        echo json_encode(true);
    }

}


?>