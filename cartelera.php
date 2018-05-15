<?php
require_once './includes/conexiones/conexion-global.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartelera</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/ss-fonts.css">
    <link rel="stylesheet" href="/assets/css/ss-style.css">
</head>
<body>
<?php
     require_once './includes/navbar.inc.php';
     require_once './includes/header.inc.php';
?>

    <main class="ss-main-container">
        <div class="container-fluid">
            <section>
                <article class="ss-grid-cartelera-main">
                <!-- GRID FORMATEADO PARA CABECERA JUNTO A DOS FILAS DE 3 ELEMENTOS -->
                    
                    
                </article>
            </section>
        </div>
    </main>
    <div class="modal fade" id="pelicula" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
            <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        
        </div>
  </div>
    
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/ss-tuCine.js"></script>
</body>
</html>