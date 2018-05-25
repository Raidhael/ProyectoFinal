<?php
ini_set('session.name','ss-tuCine');
session_start();
if (!isset($_SESSION['email'])){
    header('location: /');
     exit();
}
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] == null || $_SESSION['tipo'] != 'administrador'){
    header('location: /');
    exit();

}
?>