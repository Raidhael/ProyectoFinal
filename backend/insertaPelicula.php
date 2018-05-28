<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/backend/includes/sesiones/sesionObligatoria.inc.php';
//SE VERIFICAN QUE LOS VALORES DE LA IMAGEN SON LOS CORRECTOS
if (isset($_POST['insertar'])){
//ARRAY PARA ERRORES PERSONALIZADOS
$errores = array('titulo' => false , 'tipo'  => false, 'duracion'  => false, 'sipnopsis'  => false, 'size'  => false , 'img'  => false , 'subida'  => false);
    //CONEXION
    require_once $_SERVER['DOCUMENT_ROOT'].'/backend/includes/conexiones/conexion-global.php';
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
    foreach ($errores as $error){
        if (!$error){
            $bandera = false;
            break;
        }
    }

    if ($bandera){
        //SQL PARA INSERTAR
        $sql = $conexion->prepare("INSERT INTO pelicula (titulo , tipo , duracion , sipnopsis, img_pelicula) VALUES (:titulo , :tipo , :duracion , :sipnopsis, :img_pelicula);");
        $sql->bindParam(':titulo', $titulo);
        $sql->bindParam(':tipo', $tipo);
        $sql->bindParam(':duracion', $duracion);
        $sql->bindParam(':sipnopsis', $sipnopsis);
        $sql->bindParam(':img_pelicula', $rutaServer);
        if ($sql->execute()){
            echo '<h1> TODO CORRECTO</h1>';
        }else{
            echo '<h1> ¡Ups! No se ha podido insertar la pelicula</h1>';
        }
    }else
    $erroresJSON = json_encode($errores);
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
        <div class="container-fluid">
            <h1>Inserta Pelicula</h1>
            <section class="row">
            
                <article>
                <form action="#" id="insertaPelicula" method="post" enctype="multipart/form-data">
                <input type="file" name="imagen" id="img_perfil" class="ss-img">
                <input type="text" name="titulo" id="titulo" class="ss-item-titulo" placeholder="Inserta titulo">
                <input type="text" name="tipo" id="tipo" class="ss-item-specs" placeholder=" Ej: Comedia-Romance-Drama">
                <input type="number" name="duracion" id="duracion" class="ss-item-duracion" placeholder="Duracion en minutos">
                <textarea name="sipnopsis" id="sipnopsis" cols="30" rows="10" class="ss-item-sipnopsis" placeholder="INSERTAR DESCRIPCION"></textarea>
                <input type="submit" name="insertar" value="INSERTAR PELICULA" class="ss-item-enviar">
        <?php
            if (isset($erroresJSON))
            echo '<input type="hidden" value="'.$erroresJSON.'">';

        ?>
            </form>

            </article>
            </section>
        </div>
    </main>    

<script src="/backend/js/jquery.js"></script>
<script src="/backend/js/bootstrap.min.js"></script>
<script src="/backend/js/ss-tuCine.js"></script>
</body>
</html>