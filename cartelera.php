<?php
require_once './includes/conexiones/conexion-global.php';
 if (isset($_GET['id']) && $_GET['id'] != null && is_numeric($_GET['id'])) $id = $_GET['id'];
 else $id='';
 if (isset($_GET['pag']) && $_GET['pag'] != null && is_numeric($_GET['pag'])) $pag = $_GET['pag'];
 else $pag=1;
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
            <section id="contenido">

            </section>
        </div>
    </main>
<!-- Modal -->
<div class="modal fade" id="pelicula" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Modal Header</h3>
          <button type="button" class="close" data-dismiss="modal"><?php echo file_get_contents('./assets/images/SVG/cancel.svg')?></button>
        </div>
        <div class="modal-body">
            <article class="ss-grid-pelicula">
                <figure class="ss-img-cartelera">
                    <img src="ejemplo" alt="'.$pelicula['titulo'].'">
                </figure>                   
                <div class="ss-item-specs-cartelera"><h5></h5></div>
                <div class="ss-item-duracion-cartelera"><h5></h5></div>
                <div class="ss-item-sipnopsis-cartelera"></div>                
            </article>
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div>
</div>
<?php               
        echo '<input type="hidden" name="id" id="id" value="'.$id.'">';
        echo '<input type="hidden" name="pag" id="pag" value="'.$pag.'">';
    ?>
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/ss-cartelera.js"></script>
    <script src="/assets/js/ss-tuCine.js"></script>
</body>
</html>