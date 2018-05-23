<?php
ini_set('session.name','ss-tuCine');
session_start();
if (!isset($_SESSION['email'])) exit();
?>