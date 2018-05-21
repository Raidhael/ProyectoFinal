<?php
require_once './includes/sesiones/sesion.inc.php';
if (isset($_SESSION['email']) && $_SESSION['email'] != null ){
    require_once './includes/conexiones/conexion-global.php';
    $sql =$conexion->prepare("SELECT * from usuario WHERE email like :email;");
    $sql->bindParam(':email', $_SESSION['email']);
    $sql->execute();
    $datos = $sql->fetch(PDO::FETCH_ASSOC);    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/ss-fonts.css">
    <link rel="stylesheet" href="/assets/css/ss-style.css">
    <link rel="stylesheet" href="/assets/css/ss-perfil.css">
    
</head>
<body>
    <?php
    
    require_once './includes/navBar.inc.php';
    ?>
    
    <main class="ss-main-container">
        <section class="container-fluid">
            <div class="ss-grid-perfil">
                <div class="img-perfil">
                    <span class="ss-perfil-titulo" id="img_perfil">Foto perfil:</span>
                    <figure>
                        <img class="img-circle  img-responsive" src="<?=$datos['img_perfil']?>" alt="imagen  de perfil">
                    </figure>
                    <button class="btn pull-right"> Cambiar foto</button>
            </div>
            <div class="ss-perfil-nickname">
                <span class="ss-perfil-titulo">Nickname:</span>
                <span class="ss-perfil-datos" id ="nickname"><?=$datos['nickname']?></span>
                <button class="btn pull-right"> EDITAR</button>
            </div>
            <div class="ss-perfil-nombre">
                <span class="ss-perfil-titulo">Nombre:</span>
                <span class="ss-perfil-datos" id ="nombre"><?=$datos['nombre']?></span>
                <button class="btn pull-right"> EDITAR</button>
            </div>
            <div class="ss-perfil-ape1">
                <span class="ss-perfil-titulo">1º Apellido:</span>
                <span class="ss-perfil-datos" id ="ape1"><?=$datos['ape1']?></span>
                <button class="btn pull-right"> EDITAR</button>
            </div>
            <div class="ss-perfil-ape2">
                <span class="ss-perfil-titulo">2nd Apellido:</span>
                <span class="ss-perfil-datos" id ="ape2"><?=$datos['ape2']?></span>
                <button class="btn pull-right"> EDITAR</button>
            </div>
            <div class="ss-perfil-dni">
                <span class="ss-perfil-titulo">DNI:</span>
                <span class="ss-perfil-datos" id ="DNI"><?=$datos['DNI']?></span>
                
            </div>
            <div class="ss-perfil-email">
                <span class="ss-perfil-titulo">Email:</span>    
                <span class="ss-perfil-datos" id ="email"><?=$datos['email']?></span>
                <button class="btn pull-right"> EDITAR</button>
            </div>
            <div class="ss-perfil-date">
                <span class="ss-perfil-titulo">Fecha de nacimiento:</span>    
                <span class="ss-perfil-datos" id ="fecha_nac"><?=$datos['fecha_nac']?></span>
                <button class="btn pull-right"> EDITAR</button>
            </div>
            <div class="ss-perfil-clave">
                <span class="ss-perfil-titulo">Contraseña:</span>    
                <span class="ss-perfil-datos" id ="clave">???????????????</span>
                <button class="btn pull-right"> EDITAR</button>
            </div>
            </div>
        </section>
    </main>

    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/ss-tuCine.js"></script>
    <script src="/assets/js/ss-perfil.js"></script>
</body>
</html>











<?php

}else{
    header('location: /registro.php');
}

?>