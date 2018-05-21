<?php
require_once './includes/sesiones/sesion.inc.php';
session_destroy();

header('location: /');


?>