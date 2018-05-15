<?php 

try{ 
                           
    $opcion = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $conexion = new PDO('mysql:host=localhost;dbname=cine;','admin','sergio2018',$opcion);

}catch (PDOException $e) {

    echo 'Fallo la conexion '. $e->getMessage();
    
}


?>