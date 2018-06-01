<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/backend/includes/sesiones/sesionObligatoria.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/backend/includes/conexiones/conexion-global.php';
//SE VERIFICAN QUE LOS VALORES DE LA IMAGEN SON LOS CORRECTOS
$alerta='';
$alerta_img = '';
$alerta_titulo = '';
$alerta_tipo = '';
$alerta_duracion = '';
$alerta_sipnopsis = '';
if (isset($_POST['insertar'])){
//ARRAY PARA ERRORES PERSONALIZADOS
$errores = array('titulo' => false , 'tipo'  => false, 'duracion'  => false, 'sipnopsis'  => false, 'size'  => false , 'img'  => false , 'subida'  => false);    
    if (isset($_POST['titulo']) && !empty($_POST['titulo']) ){
        $sql = $conexion->prepare('SELECT count(*) FROM pelicula WHERE titulo LIKE :titulo ;');
        $sql->bindParam(':titulo', $_POST['titulo']);
        $sql->execute();
        $sql = $sql->fetch(PDO::FETCH_NUM)[0];
        if ($sql > 0 ) {
            $errores['titulo'] = false;
        }else{
            $titulo = $_POST['titulo'];
            $errores['titulo']=true;
        }  
    }else{
        $errores['titulo']=false;
    }
    if(isset($_POST['tipo']) && !empty($_POST['tipo'])){
        $errores['tipo']=true;
        $tipo = $_POST['tipo'];
    }else{
        $errores['tipo']=false;
    }
    if (isset($_POST['duracion']) && !empty($_POST['duracion']) && is_numeric($_POST['duracion'])){
        $errores['duracion']=true;
        $duracion=$_POST['duracion'];
    }else{
        $errores['duracion']=false;
    }
    if(isset($_POST['sipnopsis']) && !empty($_POST['sipnopsis'])){
        $errores['sipnopsis']=true;
        $sipnopsis = $_POST['sipnopsis'];
    }else{
        $errores['sipnopsis']=false;
    }
    if (isset($_FILES['imagen']) && $_FILES['imagen'] != null){

    //SE RECIBEN DATOS JUNTO EL FORMULARIO
    if ($_FILES['imagen']['size'] > 0){
        $errores['size']=true;
        //VALIDACION MIME - SE PERMITEN ARCHIVOS JPEG JPG
        $tipo = explode('image/',$_FILES["imagen"]["type"])[1];
        if ($tipo == 'jpeg' || $tipo == 'jpg'){
            $errores['img'] = true;
            $ruta = $_SERVER['DOCUMENT_ROOT'].'/images/JPG';
            if ($errores['titulo'] && $errores['tipo'] && $errores['duracion'] && $errores['sipnopsis']){
                $archivo = $titulo.'.'.$tipo;
                //SE SUBE LA IMAGEN
                $destinoFinal = $ruta.'/'.$archivo;   
               if (move_uploaded_file ( $_FILES [ 'imagen' ][ 'tmp_name' ], $destinoFinal)){
                    $errores['subida']=true;
                    $rutaServer = '/images/JPG/'.$archivo;
                }else{
                    $errores['subida']=false;
                }
            }
        }else{
            $errores['img'] = false;
        }
    }else{
        $errores['size'] = false;
    }    
}   
    $bandera = true;
    foreach ($errores as $campo => $error){
        if (!$error){
            $bandera = false;
            switch ($campo) {
                case 'titulo':
                    $alerta_titulo = ' ¡El campo titulo es obligatorio!';
                    break;
                case 'tipo':
                    $alerta_tipo = ' ¡El campo tipo es obligatorio!';
                    break;
                case 'duracion':
                    $alerta_duracion = ' ¡El campo duracion es obligatorio!';
                    break;
                case 'sipnopsis':
                    $alerta_sipnopsis = ' ¡El campo sipnopsis es obligatorio!';
                    break;
                case 'size':
                    $alerta_img = ' ¡Es obligatorio seleccionar una imagen!';
                    break;
            }
            $alerta='<div class="alert alert-danger"> ¡Ups! No se ha podido insertar la película</div>';
            
        }
    }

    if ($bandera){
        //SQL PARA INSERTAR
        $sql = $conexion->prepare("INSERT INTO pelicula (titulo , tipo , duracion , sipnopsis, img_pelicula) VALUES (:titulo , :tipo , :duracion , :sipnopsis, :img_pelicula);");
        $sql->bindParam(':titulo', $titulo);
        $sql->bindParam(':tipo', $_POST['tipo']);
        $sql->bindParam(':duracion', $duracion);
        $sql->bindParam(':sipnopsis', $sipnopsis);
        $sql->bindParam(':img_pelicula', $rutaServer);
        if ($sql->execute()){
            $alerta='<div class="alert alert-success">Se ha insertado correctamente la película</div>';
        }else{
            $alerta='<div class="alert alert-danger"> ¡Ups! No se ha podido insertar la película</div>';
        }
    }else{
        $alerta='<div class="alert alert-danger"> ¡Ups! No se ha podido insertar la película</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserta Pelicula</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ss-fonts.css">
    <link rel="stylesheet" href="css/config-global.css">
    <link rel="stylesheet" href="css/insertaPelicula.css">
</head>
<body>
<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/backend/includes/navBar.inc.php';

?>  
    
    <main class="ss-main-container">
    <?php     echo $alerta;  ?>
        <div class="container-fluid">
            <ul class="nav nav-pills nav-justified">
                <li id="ss-sesion" class="active"><a data-toggle="pill" href="#inserta">Inserta Pelicula</a></li>
                <li id="ss-registrate"><a data-toggle="pill" href="#edita">Edita Pelicula</a></li>
            </ul>
            <div class="tab-content">
                <div id="inserta" class="tab-pane fade in active">
                    <section>
                        <form action="#" id="insertaPelicula" method="post" enctype="multipart/form-data">
                        <label id = "alerta_ss-img" for="img_perfil"><?=$alerta_img?></label>
                            <div class="ss-img">
                                <input type="file" name="imagen" id="img_perfil" >
                            </div>
                            <div class="ss-item-titulo-inserta">
                                <label for="titulo"><?=$alerta_titulo?></label>
                                <input type="text" name="titulo" id="titulo"  placeholder="Inserta titulo">
                            </div> 
                            <div class="ss-item-specs-inserta" >
                                <label for="tipo"><?=$alerta_tipo?></label>
                                <input type="text" name="tipo" id="tipo" placeholder=" Ej: Comedia-Romance-Drama">
                            </div>
                            <div class="ss-item-duracion-inserta">
                                <label for="duracion"><?=$alerta_duracion?></label>
                                <input type="number" name="duracion" id="duracion"  placeholder="Duracion en minutos">
                            </div>
                            <div class="ss-item-sipnopsis-inserta">
                                <label for="sipnopsis"><?=$alerta_sipnopsis?></label>
                                <textarea name="sipnopsis" id="sipnopsis" cols="30" rows="10"  placeholder="INSERTAR DESCRIPCION"></textarea>
                            </div>
                            <input type="submit" name="insertar" value="INSERTAR PELICULA" class="ss-item-enviar"> 
                        </form>
                    </section>
                </div>
                <div id="edita" class="tab-pane fade in">
                    <section class="ss-grid-edita-peliculas">
                    <div class="ss-grid-edita-acciones">
                        <button id="confirm-delete" class="btn btn-danger btn-lg pull-left" data-toggle="modal" data-target="#borrado"> ELIMINAR</button>
                        
                        <button id="edicion" class="btn btn-success btn-lg pull-right" data-toggle="modal" data-target="#ss-edicion-pelicula"> EDITAR</button>
                    </div>
                            <?php
                           $sql = 'SELECT * FROM pelicula LIMIT 1';
                            $resultado = $conexion->query($sql);
                            $pelicula = $resultado->fetch(PDO::FETCH_ASSOC);
                            echo '
                                <figure id="'.$pelicula['id_pelicula'].'" class="ss-img-slider">
                                    <img src="'.$pelicula['img_pelicula'].'" alt="'.$pelicula['titulo'].'">
                                </figure>
                                <div class="ss-item-titulo">  <h4>'.$pelicula['titulo'].'</h4></div>                   
                                <div class="ss-item-specs">   <h5>'.$pelicula['tipo'].'</h5></div>
                                <div class="ss-item-duracion"><h5>'.$pelicula['duracion'].'min</h5></div>
                                <div class="ss-item-sipnopsis">
                                    '.$pelicula['sipnopsis'].' 
                                </div>';
                            ?>
                        <div id="new-navigation" class="ss-slider-new-navigation">
                            <span class="ss-slider-navigation-left pull-left">
                                <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/images/SVG/flecha-left.svg');?>
                                </span>
                                <span class="ss-slider-navigation-right pull-right">
                                <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/images/SVG/flecha-right.svg');?>
                            </span>
                        </div>
                    </section>
                </div>   
            </div>   
        </div>

        </div>
    </main>    
    <div class="modal fade" id="borrado" tabindex="-1" role="dialog" aria-labelledby="borrado o" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="borrado">¿Seguro que desea borrar la imagen?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info"  data-dismiss="modal">CANCELAR</button>
                    <button  id="borrar" class="btn btn-danger" data-dimiss="modal" >BORRAR</a>
                </div>
            </div>
        </div>
    </div>

        <div class="modal fade" id="ss-edicion-pelicula" tabindex="-1" role="dialog" aria-labelledby="borrado o" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="borrado">¿Seguro que desea editar la imagen?</h4>
                </div>
                <div class="modal-body">
                <section>
                        <form action="#" id="editaPelicula" method="post" enctype="multipart/form-data">
                        <label id = "alerta_ss-img" for="img_pelicula_edita"></label>
                            <div class="ss-img">
                                <input type="file" name="imagen" id="img_pelicula_edita" >
                            </div>
                            <div class="ss-item-titulo-inserta">
                                <label for="titulo_edita"></label>
                                <input type="text" name="titulo" id="titulo_edita"  placeholder="Inserta titulo">
                            </div> 
                            <div class="ss-item-specs-inserta" >
                                <label for="tipo_edita"></label>
                                <input type="text" name="tipo" id="tipo_edita" placeholder=" Ej: Comedia-Romance-Drama">
                            </div>
                            <div class="ss-item-duracion-inserta">
                                <label for="duracion_edita"></label>
                                <input type="number" name="duracion" id="duracion_edita"  placeholder="Duracion en minutos">
                            </div>
                            <div class="ss-item-sipnopsis-inserta">
                                <label for="sipnopsis_edita"></label>
                                <textarea name="sipnopsis" id="sipnopsis_edita" cols="30" rows="10"  placeholder="INSERTAR DESCRIPCION"></textarea>
                            </div>
                            <input type="hidden" name="identificador" id="identificador" value="">
                        </form>
                    </section>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-success"  id="ss-editar-pelicula">EDITAR</button>
                <button type="button" class="btn btn-warning"  data-dismiss="modal">CANCELAR</button>
                    
                </div>
            </div>
        </div>
    </div>
<script src="/backend/js/jquery.js"></script>
<script src="/backend/js/bootstrap.min.js"></script>
<script src="/backend/js/ss-tuCine.js"></script>
<script src="/backend/js/ss-insertaPeliculas.js"></script>
</body>
</html>