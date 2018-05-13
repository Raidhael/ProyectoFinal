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
     require_once 'includes/navbar.inc.php';
?>
    <header class="ss-main-header">
    <div class="ss-logo-cine">
        <a href="/">
            <img src="assets/images/PNG/logo-cine.png" alt="Logotipo">
        </a>
    </div>
        <h1> Inicio</h1>
    </header>
    <main class="ss-main-container">
        <div class="container-fluid">
            <section class="row">
                <article class="ss-grid-ultimas-peliculas">
                    <h2 class="ss-header-item"> Ultimas Peliculas</h2>
                    <figure class="ss-img-slider">
                        <img src="assets/images/JPG/AVENGERS.jpg" alt="Pelicula1">
                    </figure>
                    <div class="ss-item-slider ss-item-titulo">
                         <h4>Titulo</h4>
                    </div>                   
                    <div class="ss-item-slider ss-item-specs">
                         <h5>Tipo</h5>
                    </div>
                    <div class="ss-item-duracion">
                        <h5>Duración</h5>
                    </div>
                    <div class="ss-item-slider ss-item-sipnopsis">
                         Sinopsis: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto laboriosam dolorem veniam molestiae nostrum autem, alias tenetur consectetur harum ex minus fugit eum molestias culpa atque enim distinctio nisi id.
                    </div> 
                
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
                    <div class="ss-grid-cartelera-item">
                        <figure>    
                            <img  class="img-responsive" src="./assets/images/JPG/avengers.jpg" alt="">    
                            <figcaption><h5 class="ss-cartelera-titulo">Titulo Ejemplo</h5></figcaption>
                        </figure>
                    </div>
                    <div class="ss-grid-cartelera-item">
                        <figure>    
                            <img  class="img-responsive" src="./assets/images/JPG/avengers.jpg" alt="">    
                            <figcaption><h5 class="ss-cartelera-titulo">Titulo Ejemplo</h5></figcaption>
                        </figure>
                    </div>
                    <div class="ss-grid-cartelera-item">
                        <figure>    
                            <img  class="img-responsive" src="./assets/images/JPG/avengers.jpg" alt="">    
                            <figcaption><h5 class="ss-cartelera-titulo">Titulo Ejemplo</h5></figcaption>
                        </figure>
                    </div>
                    <div class="ss-grid-cartelera-item">
                        <figure>    
                            <img  class="img-responsive" src="./assets/images/JPG/avengers.jpg" alt="">    
                            <figcaption><h5 class="ss-cartelera-titulo">Titulo Ejemplo</h5></figcaption>
                        </figure>
                    </div>
                    <div class="ss-grid-cartelera-item">
                        <figure>    
                            <img  class="img-responsive" src="./assets/images/JPG/avengers.jpg" alt="">    
                            <figcaption><h5 class="ss-cartelera-titulo">Titulo Ejemplo</h5></figcaption>
                        </figure>
                    </div>
                    <div class="ss-grid-cartelera-item">
                        <figure>    
                            <img  class="img-responsive" src="./assets/images/JPG/avengers.jpg" alt="">    
                            <figcaption><h5 class="ss-cartelera-titulo">Titulo Ejemplo</h5></figcaption>
                        </figure>
                    </div>
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