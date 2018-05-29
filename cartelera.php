<?php
require_once './includes/sesiones/sesion.inc.php';
require_once './includes/conexiones/conexion-global.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartelera</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/ss-fonts.css">
    <link rel="stylesheet" href="/css/config-global.css">
    <link rel="stylesheet" href="/css/ss-cartelera.css">
</head>
<body>
<?php
    require_once './includes/navbar.inc.php'; 
    require_once './includes/header.inc.php';

?>

<main class="ss-main-container">
    
        <section id="contenido">
<?php
    if (isset($_GET['id']) && $_GET['id']!= null && is_numeric($_GET['id'])){
        $existe = $conexion->prepare('SELECT count(*) FROM pelicula WHERE id_pelicula = :id');
        $existe->bindParam(':id', $_GET['id']);
        $existe->execute();
        $existe = $existe->fetch(PDO::FETCH_NUM)[0];
        if ($existe > 0) {
            $pelicula = $conexion->prepare('SELECT * FROM pelicula WHERE id_pelicula = :id');
            $pelicula->bindParam(':id', $_GET['id']);
            $pelicula->execute();
            $pelicula = $pelicula->fetch(PDO::FETCH_ASSOC);
            echo '<article class="ss-grid-cartelera-pelicula">
                    <figure id="'.$pelicula['id_pelicula'].'" class="ss-cartelera-item-img">
                        <img class="img-responsive" src="'.$pelicula['img_pelicula'].'" alt="'.$pelicula['titulo'].'">
                    </figure>
                    <h4 class="ss-cartelera-item-titulo">'.$pelicula['titulo'].'</h4>
                    <span class="ss-cartelera-item-tipo"> '.$pelicula['tipo'].'</span>
                    <span class="ss-cartelera-item-duracion"> '.$pelicula['duracion'].'min</span>
                    <p class="ss-cartelera-item-sipnopsis">'.$pelicula['sipnopsis'].'</p>
                </article>';
             echo '<div>
                    <a class="ss-atras btn btn-lg btn-danger" href="#">Atras</a>
                    <a class="ss-atras pull-right btn btn-lg btn-success" href="#">Comprar entradas</a>
                </div>';


        }
    }else {
        if (isset($_GET['pag']) && $_GET['pag']!= null && is_numeric($_GET['pag'])){
            $pag = $_GET['pag'];
        }else{
            $pag = 0;
        }
        // Se Calcula total peliculas para la paginacion
        $numPeliculas = $conexion->query('SELECT count(*) FROM pelicula;')->fetch(PDO::FETCH_NUM)[0];
        if ( $numPeliculas%6 != 0 ) $totalPaginas = floor($numPeliculas / 6 + 1);
        else $totalPaginas = $numPeliculas / 6;
        $rango  = $pag * 6;
        //Consulta SQL para extraer las peliculas en cartelera
        $resultado = $conexion->query('SELECT id_pelicula , titulo , img_pelicula FROM pelicula  ORDER BY id_pelicula DESC LIMIT '.$rango.' ,6;');

        //Se imprime la estructura html con los resultados
        echo '<article class="ss-grid-cartelera">';
        while (($peliculas = $resultado->fetch(PDO::FETCH_ASSOC)) != null ){
            echo  '<div class="ss-grid-cartelera-item">
            <a href="cartelera.php?id='.$peliculas['id_pelicula'].'">
                <figure id ="'.$peliculas['id_pelicula'].'">    
                    <img  class="img-responsive" src="'.$peliculas['img_pelicula'].'" alt="'.$peliculas['titulo'].'">    
                    <figcaption><h4 class="ss-cartelera-titulo">'.$peliculas['titulo'].'</h4></figcaption>
                </figure>
            </a>
        </div>';
        }
        echo '</article>';

        //Se hace la paginacion
        if ($totalPaginas > 1){
            
            echo '<div  class="ss-cartelera-paginacion">';
            if ($pag != 0) {
               if (($pag - 1) == 0 ) echo ' <a href="cartelera.php" class="ss-prev-pag">'.file_get_contents($_SERVER['DOCUMENT_ROOT'].'/images/SVG/flecha-left.svg').' </a>';
               else echo ' <a href="cartelera.php?pag='.($pag-1).'" class="ss-prev-pag">'.file_get_contents($_SERVER['DOCUMENT_ROOT'].'/images/SVG/flecha-left.svg').' </a>';
            }
            for ($i = 0 ; $i < $totalPaginas; $i++){
                if (($i)== $pag) echo '<span class="ss-pag-actual">'.($i + 1).'</span>';
                else if ($i == 0)  echo '<a href="cartelera.php">'.($i+1).'</a>';
                else echo '<a href="cartelera.php?pag='.($i).'">'.($i+1).'</a>';
                if (( $i + 1 ) != $totalPaginas) echo ' - ';
            }
            if (($pag+1) != $totalPaginas){       
                echo ' <a href="cartelera.php?pag='.($pag+1).'" class="ss-next-pag"> '.file_get_contents($_SERVER['DOCUMENT_ROOT'].'/images/SVG/flecha-right.svg').' </a>';
            }
        echo '</div>';
        } 
    }
?>
            </section>
        
    </main>
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/ss-tuCine.js"></script>
    <script src="/js/ss-cartelera.js"></script>
</body>
</html>