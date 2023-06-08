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
var_dump($_POST['fecha-ida']);
echo '<br>';
require("../negocio/reservasReglasNegocio.php");

$reservaIDA = new reservaReglasNegocio();
$reservaIDA->init($_POST['vuelo-ida'], $_SESSION['username'], $fecha, $_POST['precio-ida']);
