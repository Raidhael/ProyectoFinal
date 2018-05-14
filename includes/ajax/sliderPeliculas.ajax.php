<?php
    require_once '../conexiones/conexion-global.php';

    
    if (isset($_POST['action'])){
        //Se saca el primer elemento de la tabla para no exceder el limite
        $primerElemento = 'SELECT id_pelicula FROM pelicula ORDER BY id_pelicula ASC Limit 1;';
        $primerElemento = $conexion->query($primerElemento);
        $primerElemento = $primerElemento->fetch(PDO::FETCH_ASSOC)['id_pelicula'];

        //Se saca el ultimo elemento de la tabla para no exceder el limite
        $ultimoElemento = 'SELECT id_pelicula FROM pelicula ORDER BY id_pelicula DESC Limit 1;';
        $ultimoElemento = $conexion->query($ultimoElemento);
        $ultimoElemento = $ultimoElemento->fetch(PDO::FETCH_ASSOC)['id_pelicula'];


        if ($_POST['action'] == 'next'){
            if (isset($_POST['id']) && $_POST['id'] != null &&  is_numeric($_POST['id'])){
                if ($_POST['id']+1 <= $ultimoElemento){
                    $id = $_POST['id'] + 1;
                    $siguienteElemento = $conexion->prepare('SELECT * FROM pelicula WHERE id_pelicula = :id;');
                    $siguienteElemento->bindParam(':id',$id);
                    $siguienteElemento->execute();
                    $siguienteElemento = $siguienteElemento->fetch(PDO::FETCH_ASSOC);
                    echo json_encode($siguienteElemento);
                }else{
                    $id = $primerElemento;
                    $siguienteElemento = $conexion->query('SELECT * FROM pelicula WHERE id_pelicula ='.$id.';');
                    $siguienteElemento = $siguienteElemento->fetch(PDO::FETCH_ASSOC);
                    echo json_encode($siguienteElemento);
                }

            }
        }else if ($_POST['action'] == 'prev'){
            if (isset($_POST['id']) && $_POST['id'] != null &&  is_numeric($_POST['id'])){
                //Se saca el ultimo elemento de la tabla para no exceder el limite
                if ($_POST['id']-1 >=$primerElemento){
                    $id = $_POST['id'] - 1;
                    $siguienteElemento = $conexion->prepare('SELECT * FROM pelicula WHERE id_pelicula = :id;');
                    $siguienteElemento->bindParam(':id',$id);
                    $siguienteElemento->execute();
                    $siguienteElemento = $siguienteElemento->fetch(PDO::FETCH_ASSOC);
                    echo json_encode($siguienteElemento);
                }else{
                    $id = $ultimoElemento;
                    $siguienteElemento = $conexion->query('SELECT * FROM pelicula WHERE id_pelicula ='.$id.';');
                    $siguienteElemento = $siguienteElemento->fetch(PDO::FETCH_ASSOC);
                    echo json_encode($siguienteElemento);
                }

            }       
        }
    }
?>