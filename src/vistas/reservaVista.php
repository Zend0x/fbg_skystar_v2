<?php

//iniciar la sesión para poder acceder a los datos del usuario
session_start();

var_dump($_POST["vuelo-ida"]);
var_dump($_POST["vuelo-vuelta"]);
var_dump($_POST['precio-ida']);
var_dump($_POST['precio-vuelta']);
require("../negocio/reservasReglasNegocio.php");

$reservaRN = new reservaReglasNegocio();
$reservaIDA->init($_POST['vuelo-ida'], $_SESSION['username'], $fecha, $precio);
