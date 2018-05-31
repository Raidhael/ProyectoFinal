<?php

if (isset($_POST)){
    $bandera = true;
    //VALIDACION DE NOMBRE
    if (isset($_POST['nombre']) && $_POST['nombre'] != null){
        $pattern = "/^[a-z A-Z\s]{2,25}$/";
        
        if (preg_match($pattern , $_POST['nombre'])) $bandera=true;
        else $bandera = false;
        
    }else $bandera=false;





    //VALIDACION DE NICKNAME
    if (isset($_POST['nickname']) && $_POST['nickname'] != null){
        $pattern =" /^[\w\s]{4,16}$/";
        if (preg_match($pattern , $_POST['nickname'])) $bandera=true;
        else $bandera = false;
    }else $bandera=false;



    //VALIDACION DE DNI
    if (isset($_POST['dni']) && $_POST['dni'] != null){
        $pattern = "/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]{1}$/i";
        if (preg_match($pattern , $_POST['dni'])){
            $letraDNI = ["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"];
            $letra = substr($_POST['dni'], -1);
            $dni = substr($_POST['dni'], 0, -1);
            $resto = $dni % 23;
            if ($letraDNI[$resto] == $letra ){
                require_once '../conexiones/conexion-global.php';
                $sql = $conexion->prepare('SELECT count (*) FROM usuario WHERE dni = :dni;');
                $sql->bindParam(':dni' , $_POST['dni']);
                $sql->execute();
                $sql = $sql->fetch(PDO::FETCH_NUM)[0];
                if ($sql == 0) $bandera = true;
                else $bandera = false;

            } else $bandera = false;
        }else  $bandera = false;
    }else  $bandera = false;



    //VALIDACION DEL PRIMER APELLIDO
    if (isset($_POST['ape_1']) && $_POST['ape_1'] != null){
        $pattern = "/^[a-z A-Z\s]{2,25}$/";
        if (preg_match($pattern , $_POST['ape_1'])) $bandera=true;
        else  $bandera = false; 
    }else  $bandera=false;
    //VALIDACION DEL SEGUNDO APELLIDO EN CASO DE ESTAR VACIO PUES ES OPCIONAL SE APLICAL EL VALOR STRING "-"
    if (isset($_POST['ape_2']) && $_POST['ape_2'] != null){
        $pattern = "/^[a-z A-Z\s]{2,25}$/";
        if (preg_match($pattern , $_POST['ape_2'])) $bandera=true;
        else $bandera = false;
    }else $ape_2 = '-';





    //VALIDACION DE EMAIL
    if (isset($_POST['email']) && $_POST['email'] != null){
        $pattern = ' /^[^0-9][a-zA-Z0-9_.]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/ ';
        if (preg_match($pattern, $_POST['email'])) {
            $sql = $conexion->prepare('SELECT count (*) FROM usuario WHERE email = :email;');
            $sql->bindParam(':email' , $_POST['email']);
            $sql->execute();
            $sql = $sql->fetch(PDO::FETCH_NUM)[0];

            if ($sql == 0) $bandera=true;
            else $bandera = false;
        }else  $bandera = false;    
    }else $bandera=false;





    //VALIDACION DE FECHA, SE VERIFICA QUE SEA MAYOR DE 7 AÑOS EL USUARIO
    if (isset($_POST['fecha']) && $_POST['fecha'] != null){
        $year = explode('-', $_POST['fecha'])[2];
        if (date('Y') - $year < 7) $bandera=false;
        else $bandera=true;
    }else $bandera=false;
    //VALIDACION DE CONTRASEÑA Y ENCRIPTACION DE ESTA
    if (isset ($_POST['password']) && $_POST['password'] != null){
        $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&\]|[^ ]){8,16}$/";
        if (preg_match( $pattern, $_POST['password'])){
            $clave = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }else $bandera = false;

    }else $bandera = false;



    //EN CASO DE SER TRUE SE AÑADE EL USUARIO A LA BASE DE DATOS - REGISTRO COMPLETADO SIN NINGUNA FALLA
    if ($bandera){
        
        $sql = $conexion->prepare("INSERT INTO usuario (nickname, clave, DNI , nombre, ape1, ape2 ,email , fecha_nac, tipo) VALUES(:nickname,:clave,:dni,:nombre,:ape_1 ,:ape_2,:email,:fecha,'usuario');");
        $sql->bindParam(':nickname', $_POST['nickname']);
        $sql->bindParam(':clave', $clave);
        $sql->bindParam(':dni', $_POST['dni']);
        $sql->bindParam(':nombre', $_POST['nombre']);
        $sql->bindParam(':ape_1', $_POST['ape_1']);
        $sql->bindParam(':ape_2', $_POST['ape_2']);
        $sql->bindParam(':email', $_POST['email']);
        $sql->bindParam(':fecha', $_POST['fecha']);
        $bandera =$sql->execute();
        

        echo json_encode($bandera);
    }
    //SE DEVUELVE LA BANDERA
   
}
?>