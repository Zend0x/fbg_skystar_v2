<?php

//iniciar la sesión para poder acceder a los datos del usuario
session_start();

var_dump($_POST["vuelo-ida"]);
echo '<br>';
var_dump($_POST["vuelo-vuelta"]);
echo '<br>';
var_dump($_POST['precio-ida']);
echo '<br>';
var_dump($_POST['precio-vuelta']);
echo '<br>';
echo "fecha: " . $_POST['fecha-ida'];
echo '<br>';

echo "fecha de vuelta: " . $_POST['fecha-vuelta'];
require("../negocio/reservasReglasNegocio.php");

$reservaIDA = new reservaReglasNegocio();
$reservaIDA->init($_POST['vuelo-ida'], $_SESSION['username'], $_POST['fecha-ida'], $_POST['precio-ida']);
echo $reservaIDA->insertar();

$reservaVuelta = new reservaReglasNegocio();
$reservaVuelta->init($_POST['vuelo-vuelta'], $_SESSION['username'], $_POST['fecha-vuelta'], $_POST['precio-vuelta']);
echo $reservaVuelta->insertar();
echo '<br>';
echo intval($_POST['precio-ida']) + intval($_POST['precio-vuelta']);
