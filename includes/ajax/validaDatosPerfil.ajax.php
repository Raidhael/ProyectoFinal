<?php
    require_once '../sesiones/sesion.inc.php';
    require_once '../conexiones/conexion-global.php';
if ((isset($_POST['id']) && $_POST['id'] != null) && (isset($_POST['valor']) && $_POST['valor'] != null)){

    $bandera = true;
    if ($_POST['id'] =='nombre'){
        //VALIDACION DE NOMBRE
        $pattern = "/^[a-z A-Z\s]{2,25}$/";
        if (preg_match($pattern , $_POST['valor'])) 
            $bandera=true;
        else
            $bandera = false;
        
    }else if ($_POST['id'] =='nickname'){
        //VALIDACION DE NICKNAME
        $pattern =" /^[\w\s]{4,16}$/";
        if (preg_match($pattern , $_POST['valor']))
            $bandera=true;
        else
            $bandera = false;
    }else if ($_POST['id'] =='ape1'){
        //VALIDACION DEL PRIMER APELLIDO
        $pattern = "/^[a-z A-Z\s]{2,25}$/";
        if (preg_match($pattern , $_POST['valor'])) 
            $bandera=true;
        else
            $bandera = false; 
    }else if ($_POST['id'] =='ape2'){
        //VALIDACION DEL SEGUNDO APELLIDO
        $pattern = "/^[a-z A-Z\s]{2,25}$/";
        if (preg_match($pattern , $_POST['valor'])) 
            $bandera=true;
        else
            $bandera = false;
    }else if ($_POST['id'] =='email'){
        //VALIDACION DE EMAIL
        $pattern = ' /^[^0-9][a-zA-Z0-9_.]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/ ';
        if (preg_match($pattern, $_POST['valor']))
            $bandera=true;
        else
            $bandera = false; 
    }else if ($_POST['id'] =='fecha_nac'){
        //VALIDACION DE FECHA, SE VERIFICA QUE SEA MAYOR DE 7 AÑOS EL USUARIO
        $year = explode('-', $_POST['valor'])[2];
        if (date('Y') - $year < 7) 
            $bandera=false;
        else
            $bandera=true;
    }else $bandera = false;



    if ($bandera){
        if ($_POST['id'] != 'clave'){
            $sql = $conexion->prepare('UPDATE usuario SET '.$_POST['id'].' = :val WHERE email LIKE "'.$_SESSION['email'].'";');
            $sql->bindParam(':val', $_POST['valor']);
            $bandera = $sql->execute();
        }
    }

    echo json_encode($bandera);
    //SE DEVUELVE LA BANDERA
}else if ((isset($_POST['clave-actual']) && $_POST['clave-actual']!=null) && (isset($_POST['clave-nueva']) && $_POST['clave-nueva']!=null) && (isset($_POST['clave-repetida']) && $_POST['clave-repetida']!=null)){
        $sql = 'SELECT clave FROM usuario WHERE email LIKE "'.$_SESSION['email'].'";';
        $sql = $conexion->query($sql);
        $hash = $sql->fetch(PDO::FETCH_ASSOC)['clave'];
        $errores= [];
        if (password_verify($_POST['clave-actual'],$hash)){
            $errores['acceso']=true;
            if ($_POST['clave-nueva'] == $_POST['clave-repetida']){
                $errores['coinciden']=true;
                //VALIDACION DE CONTRASEÑA Y ENCRIPTACION DE ESTA
                $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&\]|[^ ]){8,16}$/";
                if (preg_match( $pattern, $_POST['clave-nueva'])){
                    $clave = password_hash($_POST['clave-nueva'], PASSWORD_DEFAULT);
                    $sql = $conexion->prepare('UPDATE usuario SET clave = :val WHERE email LIKE "'.$_SESSION['email'].'";');
                    $sql->bindParam(':val', $clave);
                    $errores['bandera'] = $sql->execute();
                    
                    $errores['seguridad']=true;
                }else{
                    //NO CUMPLE LOS PARAMETROS DE SEGURIDAD
                    $errores['seguridad']=false;
                }
            }else{
                //LAS CLAVES NO COINCIDEN
                $errores['coinciden']=false;
            }
        }else{
            //CLAVE MAL INTRODUCIDA
            $errores['acceso']=false;
        }

    echo json_encode($errores);
}else if (isset($_FILES['img_perfil']) && $_FILES['img_perfil'] != null){
    /*Valor array name {
        name: "DeadPool2.jpg",
        type: "image/jpeg",
        tmp_name: "C:\xampp\tmp\php5352.tmp",
        error: 0, 
        size: 21419}
    */
        
    $bandera = $_FILES;
    echo json_encode($bandera);
}else {
    echo json_encode(false);
}

 
    


       





   

?>