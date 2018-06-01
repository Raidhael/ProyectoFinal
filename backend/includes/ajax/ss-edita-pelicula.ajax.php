<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/backend/includes/sesiones/sesionObligatoria.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/backend/includes/conexiones/conexion-global.php';
if (isset($_POST['identificador']) && $_POST['identificador'] && is_numeric($_POST['identificador'])){
    $id = $_POST['identificador'];
    $sql = $conexion->prepare('SELECT count(*) FROM pelicula WHERE id_pelicula = :id;');
    $sql->bindParam(':id',$id);
    $sql->execute();
    $existe = $sql->fetch(PDO::FETCH_NUM)[0];
    if ($existe == 1 ){
        if (isset($_POST['titulo']) && $_POST['titulo'] != null && isset($_POST['tipo']) && $_POST['tipo'] != null && isset($_POST['duracion']) && $_POST['duracion'] != null && is_numeric($_POST['duracion'])  && isset($_POST['sipnopsis']) && $_POST['sipnopsis'] != null ){
            $datos = array('titulo' => $_POST['titulo'] , 'tipo' => $_POST['tipo'], 'duracion' => $_POST['duracion'], 'sipnopsis' => $_POST['sipnopsis']);
            if (isset($_FILES['imagen']) && $_FILES['imagen'] != null){
                if ($_FILES['imagen']['size'] > 0){
                    $tipo = explode('image/',$_FILES["imagen"]["type"])[1];
                    if ($tipo == 'jpeg' || $tipo == 'jpg'){
                        //SE verifica que el nombre de la imagen no sea repetido
                        $nombreIMG = $_POST['titulo'].'.'.$tipo;
                        $directory = scandir($_SERVER['DOCUMENT_ROOT'].'/images/JPG');
                        $existeArchivo = false;
                        foreach ($directory as $fileName){
                            if ($fileName == $nombreIMG) $existeArchivo = true;
                        }
                        if ($existeArchivo){
                            unlink($_SERVER['DOCUMENT_ROOT'].'/images/JPG/'.$nombreIMG);
                            $existeArchivo = false;
                        }
                        if (!$existeArchivo){
                            $destinoFinal ='/images/JPG/'.$nombreIMG;
                            $direcotorio = $_SERVER['DOCUMENT_ROOT'].'/images/JPG/'.$nombreIMG;
                            //BORRADO DE LA IMAGEN ANTERIOR
                            $sql = $conexion->prepare('SELECT img_pelicula FROM pelicula WHERE id_pelicula = :id');
                            $sql->bindParam(':id',$id);
                            $sql->execute();
                            //SE SACA LA RUTA DE LA IMAGEN ACTUAL
                            $rutaIMG = $sql->fetch(PDO::FETCH_NUM)[0];
                            //Si existe se borra la imagen anterior
                            $directory = scandir($_SERVER['DOCUMENT_ROOT'].'/images/JPG');
                            $imagenAnterior = explode('/', $rutaIMG)[2];
                            $existeArchivo = false;
                            foreach ($directory as $fileName){
                                if ($fileName == $imagenAnterior) $existeArchivo = true;
                            }
                            if ($existeArchivo) unlink($_SERVER['DOCUMENT_ROOT'].$rutaIMG);
                            if (move_uploaded_file ( $_FILES [ 'imagen' ][ 'tmp_name' ], $direcotorio)){
                                $conexion->query('UPDATE pelicula SET img_pelicula = "'.$destinoFinal.'"  WHERE id_pelicula ='.$id.' ;');
                                $datos['img_pelicula']=$destinoFinal;
                            } 
                        }                    
                    }
                }        
            }
            $sql = $conexion->prepare('UPDATE pelicula SET titulo = :titulo, tipo = :tipo , duracion = :duracion, sipnopsis = :sipnopsis WHERE id_pelicula = :id');
            $sql->bindParam(':titulo', $datos['titulo']);
            $sql->bindParam(':tipo', $datos['tipo']);
            $sql->bindParam(':duracion', $datos['duracion']);
            $sql->bindParam(':sipnopsis', $datos['sipnopsis']);
            $sql->bindParam(':id',$id);
            $sql->execute();

            echo json_encode($datos);
        }
    }
}
?>