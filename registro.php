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
            <form action="#" id="ss-registro" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </main>



    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/ss-tuCine.js"></script>
</body>
</html>