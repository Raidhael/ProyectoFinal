<?php

    $alerta = 0;
    if (isset($_POST['email-login']) && $_POST['email-login'] != null && isset($_POST['pass']) && $_POST['pass'] != null) {
        require_once './includes/sesiones/sesion.inc.php';
        require_once './includes/conexiones/conexion-global.php';
        $sql = $conexion->prepare ('SELECT count(*) FROM usuario WHERE email like :email ');
        $sql->bindParam(':email', $_POST['email-login']);
         $sql->execute();
         $existe =$sql->fetch(PDO::FETCH_NUM)[0];
        if ($existe > 0){
            $sql = $conexion->prepare ('SELECT * FROM usuario WHERE email like :email ');
            $sql->bindParam(':email', $_POST['email-login']);
            $sql->execute();
            $existe = $sql->fetch(PDO::FETCH_ASSOC);
            $hash = $existe['clave'];
            $pass=$_POST['pass'];
            if (password_verify($pass,$hash)){
                $_SESSION['tipo'] = $existe['tipo'];
                $_SESSION['email'] = $existe['email'];
                echo '<h1> HOLA</h1>';
                header('location: index.php');
            }else{
                $alerta = 1;
            }
        } else{
            $alerta = 1;
        }
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/ss-fonts.css">
    <link rel="stylesheet" href="/assets/css/ss-style.css">
    <link rel="stylesheet" href="/assets/css/ss-registro.css">
</head>
<body>
<?php
     require_once './includes/navbar.inc.php';
     
?>
    <main class="ss-main-container">
        <section class="container">



        <div class="ss-registro-wrapper">
            <ul class="nav nav-pills nav-justified">
                <li id="ss-sesion" class="active"><a data-toggle="pill" href="#login">Inicio Sesion</a></li>
                <li id="ss-registrate"><a data-toggle="pill" href="#registro">Registro</a></li>
            </ul>
            <div class="tab-content">
                <div id="login" class="tab-pane fade in active">
                <form action="#" id="ss-login" method="post">
                        <div class="form-group">
                            <label for="email-login">Nomde de usuario:</label>
                            <input type="text" name="email-login" class="form-control" id="email-login" placeholder="email" >                            
                        </div>
                        <div class="form-group">
                            <label for="clave-login">Clave:</label>
                            <input type="password" class="form-control" name="pass" id="clave-login" placeholder="clave" >
                            
                        </div>                
                            <a data-toggle="pill" href="#registro" id="login"> ¿No tienes cuenta ? Registrate!</a>
                            <input type="submit" value="Entrar" class="btn btn-info pull-right">
                            <input type="hidden" value="<?=$alerta?>" id="ss-animation-control">
                    </form>
                </div>
                <div id="registro" class="tab-pane fade in">
                    <form action="#" id="ss-registro" method="post">
                        <div class="form-group">
                            <label for="nickname">Nomde de usuario:</label>
                            <input type="text" name="ninkname" class="form-control" id="nickname" placeholder="nikname" >
                        </div>
                        <div class="form-group">
                            <label for="pwd">Clave:</label>
                            <input type="password" class="form-control" name="pass" id="pwd" placeholder="clave" >
                        </div>
                        <div class="form-group">
                            <label for="dni">DNI:</label>
                            <input type="text" class="form-control" name="dni" id="dni" placeholder="11111111-R" >
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" >
                        </div>
                        <div class="form-group">
                            <label for="ape_1">1º Apellido:</label>
                            <input type="text" class="form-control"  name="ape_1" id="ape_1" placeholder="Primer apellido" >
                        </div>
                        <div class="form-group">
                            <label for="ape_2">2º Apellido:</label>
                            <input type="text" class="form-control"  name="ape_2" id="ape_2" placeholder="Segundo apellido (opcional)">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="salt@example.com" >
                        </div>
                        <div class="form-group">
                            <label for="date">Fecha de nacimiento:</label>
                            <input type="date" class="form-control" name="date" id="date" >
                        </div>
                        
                        <div class="form-group">
                        <input type="checkbox" name="TermConditions" id="TermConditions" value="0"> <span> Acepto los terminos y condiciones</span>
                        </div>
                        <input type="submit" value="Registrarse" class="btn btn-info pull-right">
                    </form>
                </div>   
             </div>   
        </div><!-- WRAPPER-->

        </section>
    </main>



    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/ss-tuCine.js"></script>
    <script src="/assets/js/ss-registro.js"></script>
</body>
</html>