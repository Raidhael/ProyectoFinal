<?php

    if (isset($_POST['id']) && $_POST['id'] != null && isset($_POST['valor']) && $_POST['valor'] != null)  {
        $completado = false;
        if ($_POST['id'] == 'email'){
            require_once '../conexiones/conexion-global.php';
            $sql = $conexion->prepare('SELECT count(*) FROM usuario WHERE email like :email');
            $sql->bindParam(':email', $_POST['valor']);
            $sql->execute();
            $existe = $sql->fetch(PDO::FETCH_NUM)[0];
            if ($existe > 0) $completado = false;
            else $completado = true;

        }else if ($_POST['id'] == 'dni'){
            require_once '../conexiones/conexion-global.php';
            $sql = $conexion->prepare('SELECT count(*) FROM usuario WHERE DNI like :dni');
            $sql->bindParam(':dni', $_POST['valor']);
            $sql->execute();
            $existe = $sql->fetch(PDO::FETCH_NUM)[0];
            if ($existe > 0) $completado = false;
            else $completado = true;
        }

        echo json_encode($completado);
    }

?>