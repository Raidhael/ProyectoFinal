<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/backend/includes/sesiones/sesionObligatoria.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/ss-fonts.css">
    <link rel="stylesheet" href="css/config-global.css">
    <link rel="stylesheet" href="css/indexBackend.css">
    <title>Inicio -Backend-</title>

</head>
<body>
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/backend/includes/navBar.inc.php';
    ?>  
        <section class="container-fluid">
        <div class="ss-actions">
            <!--GESTION DE USUARIOS , GESTION DE PELICULAS, SESIONES , SALIR-->
            <div class="ss-action-1">
            <a href="/backend/insertaPelicula.php">
                <span class="ss-titulo-accion">Añadir peliculas</span>
                <div class="ss-item-accion">
                    <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/backend/images/SVG/rollo-peli.svg')?>   
                </div> 
            </a>
 
            </div>
            <div class="ss-action-2">
            <a href="/backend/usuarios.php">
                <span class="ss-titulo-accion">Gestionar Usuarios</span>
                <div class="ss-item-accion">
                    <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/backend/images/SVG/management.svg')?>   
                </div>
            </a>  
            </div>
            <div class="ss-action-3">
                <a href="/backend/sesiones.php">
                    <span class="ss-titulo-accion">Añadir sesiones</span>
                    <div class="ss-item-accion">
                        <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/backend/images/SVG/ticket.svg')?>   
                    </div>  
                </a>
            </div>
            <div class="ss-action-4">
            <a href="/logout.php">
                <span class="ss-titulo-accion">SALIR</span>
                <div class="ss-item-accion">
                    <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/backend/images/SVG/exit.svg')?>   
                </div>  
            </a>
            </div>
        </div>

        </section>



    

<script src="/backend/js/jquery.js"></script>
<script src="/backend/js/bootstrap.min.js"></script>
<script src="/backend/js/ss-tuCine.js"></script>
</body>
</html>