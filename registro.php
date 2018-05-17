<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/ss-fonts.css">
    <link rel="stylesheet" href="/assets/css/ss-style.css">
</head>
<body>
<?php
     require_once './includes/navbar.inc.php';
     require_once './includes/header.inc.php';
?>
    <main class="ss-main-container">
        <div class="container-fluid">
            <form action="#" method="post">
                <ul id="myTabs" class="nav nav-pills nav-justified" role="tablist" data-tabs="tabs">
                    <li class="active"><a href="#cuenta" data-toggle="tab">Cuenta</a></li>
                    <li><a href="#personal" data-toggle="tab">Personal</a></li>
                </ul>
                <div class="tab-content">
                <div>
                    <div role="tabpanel" class="tab-pane fade in active" id="cuenta">
                        <div class="form-group">
                            <label for="nickname">Nickname:</label>
                            <input type="text" class="form-control" id="nickname" name="nickname">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="clave">Clave:</label>
                            <input type="password" class="form-control" id="clave" name="clave">

                            <label for="fecha_nac">Fecha:</label>
                            <input type="date" class="form-control" id="fecha_nac" name="fecha_nac">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>



    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/ss-tuCine.js"></script>
</body>
</html>