<link rel="shortcut icon" href="../../assets/favicons/favicon.ico" type="image/x-icon">
<?php
require "../negocio/reservasReglasNegocio.php";
require "../negocio/vuelosReglasNegocio.php";
session_start();

var_dump($_POST);

$reservaIda = new reservaReglasNegocio();
$reservaIda->init($_POST['vuelo-ida'], $_SESSION['username'], $_POST['fecha-ida'], $_POST['precio-ida']);
$reservaIda->insertar();
$vuelosBL = new VuelosReglasNegocio();
$vuelosBL->updateCapacity($_POST['vuelo-ida'], $_POST['total-passengers']);

if ($_POST['vuelo-vuelta'] != null) {
    $reservaVuelta = new reservaReglasNegocio();
    $reservaVuelta->init($_POST['vuelo-vuelta'], $_SESSION['username'], $_POST['fecha-vuelta'], $_POST['precio-vuelta']);
    $reservaVuelta->insertar();
    $vuelosBL = new VuelosReglasNegocio();
    $vuelosBL->updateCapacity($_POST['vuelo-vuelta'], $_POST['total-passengers']);
}
header("Location: ../vistas/perfilVista.php");
?>