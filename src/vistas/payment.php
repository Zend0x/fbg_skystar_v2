<link rel="shortcut icon" href="../../assets/favicons/favicon.ico" type="image/x-icon">
<?php
require "../negocio/reservasReglasNegocio.php";
session_start();

var_dump($_POST);

$reservaIda = new reservaReglasNegocio();
$reservaIda->init($_POST['vuelo-ida'], $_SESSION['username'], $_POST['fecha-ida'], $_POST['precio-ida']);
$reservaIda->insertar();

$reservaVuelta = new reservaReglasNegocio();
$reservaVuelta->init($_POST['vuelo-vuelta'], $_SESSION['username'], $_POST['fecha-vuelta'], $_POST['precio-vuelta']);
$reservaVuelta->insertar();

header("Location: ../vistas/perfilVista.php");
?>