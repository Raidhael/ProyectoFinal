
<?php 
    require_once '../conexiones/conexion-global.php';
  

    //Se comprueba que los valores sean los correctos
    if (isset($_POST['device']) && $_POST['device'] != null && ($_POST['device'] == 1 || $_POST['device'] == 0)){
 
        if (isset($_POST['pag']) && $_POST['pag'] != null){
            //Se saca el total de peliculas para saber cuantas paginas se van a necesitar
            $numPeliculas = $conexion->query('SELECT count(*) FROM pelicula;')->fetch(PDO::FETCH_NUM)[0];
            $pag = (int)$_POST['pag'];
            if ($_POST['device'] == 0){
                //Si es 0 significa que es movil por lo tanto se muestran  4 resultados

                //Calculo para la paginacion
                if ($pag == 1) $pag = 0;
                else $pag = $pag * 4;
                if ( $numPeliculas%4 != 0 ) $totalPaginas = floor($numPeliculas / 4 + 1);
                else $totalPaginas = $numPeliculas / 4;
                //Consulta SQL
                $resultado = $conexion->query('SELECT id_pelicula , titulo , img_pelicula FROM pelicula  ORDER BY id_pelicula DESC LIMIT '.$pag.' ,4;');
                
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
                    for ($i = 0 ; $i < $totalPaginas; $i++){
                        if ($i == $_POST['pag']) echo '<span class="ss-pag-actual">'.($i+1).'</span>';
                        else echo '<a href="#">'.($i+1).'</a>';
                    }
                    echo '</div>';
                }
            }else if ($_POST['device'] == 1){
                     //Si es 1 significa que es escritorio por lo tanto se muestran  6 resultados

                    //Calculo para la paginacion
                    if ($pag == 1) $pag = 0;
                    else $pag = $pag * 6;
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
                        for ($i = 0 ; $i < $totalPaginas; $i++){
                            echo '<a href="#">'.($i+1).'</a>';
                        }
                        echo '</div>';
                    }

                
            }
        }

    }










/*$sql = 'SELECT id_pelicula , titulo , img_pelicula FROM pelicula  ORDER BY id_pelicula DESC LIMIT 6';
$resultado = $conexion->query($sql);
while (($peliculas =$resultado->fetch(PDO::FETCH_ASSOC)) != null ){
echo  '<div class="ss-grid-cartelera-item">
<a href="#pelicula" data-toggle="modal" data-target="#pelicula">
<figure id ="'.$peliculas['id_pelicula'].'">    
    <img  class="img-responsive" src="'.$peliculas['img_pelicula'].'" alt="'.$peliculas['titulo'].'">    
    <figcaption><h5 class="ss-cartelera-titulo">'.$peliculas['titulo'].'</h5></figcaption>
</figure>
</a>
</div>';
}*/


?>