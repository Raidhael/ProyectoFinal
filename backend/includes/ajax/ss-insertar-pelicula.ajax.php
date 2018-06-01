<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/backend/includes/sesiones/sesionObligatoria.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/backend/includes/conexiones/conexion-global.php';
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
            $erroresJSON = array(json_encode($errores));
        }
    }


?>