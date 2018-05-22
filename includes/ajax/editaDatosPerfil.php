<?php
if ((isset($_POST['id']) && $_POST['id'] != null) && (isset($_POST['valor']) && $_POST['valor'] != null)){

    $sql = $conexion->prepare('UPDATE usuario SET :id = :val WHERE email = '.$_SESSION['email'].';');
    $sql->bindParam(':id', $_POST['id']);
    $sql->bindParam(':val', $_POST['valor']);
    echo json_encode($sql->exectute());
}


?>