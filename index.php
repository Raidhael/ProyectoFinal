<?php
session_start();
require_once './includes/conexiones/conexion-global.php';

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TuCine</title>
    
    <!--Links de estilos -->
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
            <section class="row">
                <article class="ss-grid-ultimas-peliculas">
                    <h2 class="ss-header-item"> Ultimas Peliculas</h2>
                    <?php
                    $sql = 'SELECT * FROM pelicula';
                    $resultado = $conexion->query($sql);
                    $pelicula = $resultado->fetch(PDO::FETCH_ASSOC);
                    echo '
                        <figure id="'.$pelicula['id_pelicula'].'" class="ss-img-slider">
                            <a href="cartelera.php?id='.$pelicula['id_pelicula'].'"><img src="'.$pelicula['img_pelicula'].'" alt="'.$pelicula['titulo'].'"></a>
                        </figure>
                        <div class="ss-item-titulo">  <h4>'.$pelicula['titulo'].'</h4>     </div>                   
                        <div class="ss-item-specs">   <h5>'.$pelicula['tipo'].'</h5>       </div>
                        <div class="ss-item-duracion">              <h5>'.$pelicula['duracion'].'min</h5>    </div>
                        <div class="ss-item-sipnopsis">
                            '.$pelicula['sipnopsis'].' 
                        </div>';
                    ?>

                    <div class="ss-slider-new-navigation">
                        <span class="ss-slider-navigation-left">
                            <?php echo file_get_contents('./assets/images/SVG/flecha-left.svg');?>
                            </span>
                            <span class="ss-slider-navigation-right">
                            <?php echo file_get_contents('./assets/images/SVG/flecha-right.svg');?>
                        </span>
                    </div>
                </article>
            </section>
                <article class="ss-grid-cartelera">
                <!-- GRID FORMATEADO PARA CABECERA JUNTO A DOS FILAS DE 3 ELEMENTOS -->
                    <h2 class="ss-header-item">Cartelera</h2>

                    <?php 
                        $sql = 'SELECT id_pelicula , titulo , img_pelicula FROM pelicula  ORDER BY id_pelicula DESC LIMIT 6';
                        $resultado = $conexion->query($sql);
                        while (($peliculas =$resultado->fetch(PDO::FETCH_ASSOC)) != null ){
                        echo  '<div class="ss-grid-cartelera-item">
                                    <a href="./cartelera.php?id='.$peliculas['id_pelicula'].'">
                                        <figure id ="'.$peliculas['id_pelicula'].'">    
                                            <img  class="img-responsive" src="'.$peliculas['img_pelicula'].'" alt="'.$peliculas['titulo'].'">    
                                            <figcaption><h5 class="ss-cartelera-titulo">'.$peliculas['titulo'].'</h5></figcaption>
                                        </figure>
                                    </a>
                                </div>';
                        }
                        
                    
                    ?>

                    <!--TODO:: REPETIR ESTE ELEMENTO 6 VECES -->
                    
                </article>
            </section>
            <section class="row">
                <article class="ss-grid-ultimaPromocion">
                    <h2 class="ss-header-item">Ultima Promocion</h2>
                    <figure class="ss-grid-item-ultimaPromocion-imagen">
                        <img src="./assets/images/jpg/avengers.jpg" alt="imagenPrueba" class="img-responsive">
                    </figure>
                    <h4 class="ss-grid-item-ultimaPromocion-titulo">Titulo de la promocion </h4>
                    <p class="ss-grid-item-ultimaPromocion-texto">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem animi nam quis amet sapiente quae quia natus vero molestiae maiores, placeat nulla reiciendis incidunt esse laudantium nobis adipisci odit tempora.</p>
                </article>
            </section>
        </div>
    </main>
    <footer class="ss-main-footer">
    
    </footer>
    <!-- SCRIPTS -->

    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/ss-tuCine.js"></script>
</body>
</html>