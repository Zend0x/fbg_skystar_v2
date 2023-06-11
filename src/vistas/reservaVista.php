<?php

//iniciar la sesión para poder acceder a los datos del usuario
session_start();

// var_dump($_POST["vuelo-ida"]);
// echo '<br>';
// var_dump($_POST["vuelo-vuelta"]);
// echo '<br>';
// var_dump($_POST['precio-ida']);
// echo '<br>';
// var_dump($_POST['precio-vuelta']);
// echo '<br>';
// echo "fecha: " . $_POST['fecha-ida'];
// echo '<br>';

// echo "fecha de vuelta: " . $_POST['fecha-vuelta'];
// require("../negocio/reservasReglasNegocio.php");

// $reservaIDA = new reservaReglasNegocio();
// $reservaIDA->init($_POST['vuelo-ida'], $_SESSION['username'], $_POST['fecha-ida'], $_POST['precio-ida']);
// echo $reservaIDA->insertar();

// $reservaVuelta = new reservaReglasNegocio();
// $reservaVuelta->init($_POST['vuelo-vuelta'], $_SESSION['username'], $_POST['fecha-vuelta'], $_POST['precio-vuelta']);
// echo $reservaVuelta->insertar();
// echo '<br>';
require '../negocio/vuelosReglasNegocio.php';
$vuelosBL = new VuelosReglasNegocio();
$datosIda = $vuelosBL->buscarPorID($_POST["vuelo-ida"]);
var_dump($datosIda);
$precioTotal = intval($_POST['precio-ida']) + intval($_POST['precio-vuelta']);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/checkout.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>Búsqueda</title>
    <?php
    ini_set('display_errors', 1);
    ini_set('html_errors', 1);
    ?>
</head>

<body>
    <div class="container">
        <nav class="navbar">
            <div class="navbar-center">
                <span class="navbar-brand"><a href="inicioVista.php"><img src="../../assets/skystar_airways.png" alt="" srcset=""></a></span>
            </div>
            <div class="navbar-right">
                <button class="login-button">Iniciar sesión</button>
            </div>
        </nav>
        <div class="content">
            <div class="column"></div>
            <div class="main-column">
                <div class="section flight-details">
                    <h2>Detalles del vuelo</h2>
                    <div class="flight-info">
                        <p>Origen: <?php echo $datosIda['departureApt'] ?></p>
                        <p>Destino: Ciudad B</p>
                        <p>Fecha y hora de salida: 11 de junio, 10:00 AM</p>
                        <p>Fecha y hora de llegada: 11 de junio, 12:00 PM</p>
                        <p>Número de vuelo: AB123</p>
                        <p>Duración del vuelo: 2 horas</p>
                    </div>
                    <!-- <div class="passenger-info">
                        <h3>Información de pasajeros</h3>
                        Formulario para ingresar información de pasajeros
                    </div>
                    <div class="additional-options">
                        <h3>Opciones adicionales</h3>
                        Opciones adicionales, como asientos preferidos, comidas especiales, etc.
                    </div> -->
                </div>
                <div class="section pricing">
                    <h2>Precios y opciones</h2>
                    <ul class="flight-list">
                        <li class="flight-item">
                            <div class="flight-info">
                                <p>Vuelo 1 - 11:00 AM - Duración: 2 horas</p>
                            </div>
                            <div class="flight-price">
                                <p>Precio: <?php echo $_POST['precio-ida'] ?>€</p>
                            </div>
                        </li>
                        <li class="flight-item">
                            <div class="flight-info">
                                <p>Vuelo 2 - 01:00 PM - Duración: 2 horas</p>
                            </div>
                            <div class="flight-price">
                                <p>Precio: <?php echo $_POST['precio-vuelta']; ?>€</p>
                            </div>
                        </li>
                    </ul>
                    <p class="total-price">Precio total: <?php echo $precioTotal ?>€</p>
                </div>

            </div>
        </div>
    </div>
</body>
<script src="buscadorVista.js"></script>

</html>