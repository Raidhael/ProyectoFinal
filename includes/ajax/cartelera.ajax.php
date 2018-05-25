
<?php 
    require_once '../conexiones/conexion-global.php';
    
        if (isset($_POST['pag']) && $_POST['pag'] != null){
            
                    //Calculo para la paginacion
                    $numPeliculas = $conexion->query('SELECT count(*) FROM pelicula;')->fetch(PDO::FETCH_NUM)[0];
                    $pag = $_POST['pag'] - 1;
                    $pag = $pag * 6;
                    if ( $numPeliculas%6 != 0 ) $totalPaginas = floor($numPeliculas / 6 + 1);
                    else $totalPaginas = $numPeliculas / 6;
                    //Consulta SQL
                    $resultado = $conexion->query('SELECT id_pelicula , titulo , img_pelicula FROM pelicula  ORDER BY id_pelicula DESC LIMIT '.$pag.' ,6;');
                    
                    //Se imprime la estructura html con los resultados
                    echo '<article class="ss-grid-cartelera">';
                    echo '<h2 class="ss-header-item">Cartelera</h2>';
                    while (($peliculas = $resultado->fetch(PDO::FETCH_ASSOC)) != null ){
                    echo  '<div class="ss-grid-cartelera-item">
                                <a href="#pelicula" data-toggle="modal" data-target="#pelicula">
                                <figure id ="'.$peliculas['id_pelicula'].'">    
                                    <img  class="img-responsive" src="'.$peliculas['img_pelicula'].'" alt="'.$peliculas['titulo'].'">    
                                    <figcaption><h5 class="ss-cartelera-titulo">'.$peliculas['titulo'].'</h5></figcaption>
                                </figure>
                                </a>
                            </div>';
                    }
                    echo '</article>';
    
                    //Se hace la paginacion
                    if ($totalPaginas > 1){
                        echo '<div  class="ss-cartelera-paginacion">';
                        if ($_POST['pag'] != 1) echo ' <a href="#" class="ss-prev-pag">'.file_get_contents('../../images/SVG/flecha-left.svg').' </a>';
                        for ($i = 0 ; $i < $totalPaginas; $i++){
                            if (($i + 1 )== $_POST['pag']) echo '<span class="ss-pag-actual">'.($i + 1).'</span>';
                            else echo '<a href="#">'.($i+1).'</a>';
                            if (( $i + 1 ) != $totalPaginas) echo ' - ';
                        }
                        if ($_POST['pag'] != $totalPaginas) echo ' <a href="#" class="ss-next-pag"> '.file_get_contents('../../images/SVG/flecha-right.svg').' </a>';
                        echo '</div>';
                    }
        }
?>