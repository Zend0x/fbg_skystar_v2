<?php
session_start();
require '../negocio/vuelosReglasNegocio.php';
$vuelosBL = new VuelosReglasNegocio();
$datosIda = $vuelosBL->buscarPorID($_POST["vuelo-ida"]);
// comprobar si hay una sesión iniciada. si no, echarlo a la página de indice
if (!isset($_SESSION['username'])) {
    header('Location: loginVista.php');
}
if (!isset($_POST['vuelo-ida'])) {
    header('Location: inicioVista.php');
}
if (isset($_POST["vuelo-vuelta"])) {
    $datosVuelta = $vuelosBL->buscarPorID($_POST["vuelo-vuelta"]);
}
if (isset($_POST['precio-vuelta'])) {
    $precioTotal = intval($_POST['precio-ida']) + intval($_POST['precio-vuelta']);
} else {
    $precioTotal = intval($_POST['precio-ida']);
}
var_dump($_POST['passengerNumber'])
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/checkout.css">
    <link rel="shortcut icon" href="../../assets/favicons/favicon.ico" type="image/x-icon">
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
                    <form action="payment.php" method="post">
                        <h2>Detalles del vuelo</h2>
                        <div class="flight-info">
                            <h3>Vuelo 1</h3>
                            <?php
                            $fechaOriginal = $datosIda[0]->getDate();
                            $fechaObjeto = date_create_from_format('Y-m-d', $fechaOriginal);
                            $fechaFormateada = $fechaObjeto->format('d-m-y');
                            ?>
                            <p>Origen: <?php echo $datosIda[0]->getDeparture() ?></p>
                            <p>Destino: <?php echo $datosIda[0]->getArrival() ?></p>
                            <p>Fecha y hora de salida: <?php echo $fechaFormateada . ", " . date('H:i', strtotime($datosIda[0]->getDepartureTime())); ?></p>
                            <p>Fecha y hora de llegada: <?php echo $fechaFormateada . ", " . date('H:i', strtotime($datosIda[0]->getArrivalTime())); ?></p>
                            <p>Número de vuelo: <?php echo $datosIda[0]->getFlightNum() ?></p>
                            <p>Duración del vuelo: <?php echo date('H:i', strtotime($datosIda[0]->getTotalFlightTime())); ?></p>
                            <input type="hidden" name="vuelo-ida" value="<?php echo $_POST['vuelo-ida'] ?>">
                            <input type="hidden" name="fecha-ida" value="<?php echo $_POST['fecha-ida'] ?>">
                            <input type="hidden" name="precio-ida" value="<?php echo $_POST['precio-ida'] ?>">
                        </div>
                        <?php
                        if (isset($datosVuelta)) {
                            echo '<div class="flight-info">';
                            echo "<h3>Vuelo 2</h3>";
                            $fechaOriginal = $datosVuelta[0]->getDate();
                            $fechaObjeto = date_create_from_format('Y-m-d', $fechaOriginal);
                            $fechaFormateada = $fechaObjeto->format('d-m-y');
                            echo "<p>Origen: " . $datosVuelta[0]->getDeparture() . "</p>";
                            echo "<p>Destino: " . $datosVuelta[0]->getArrival() . "</p>";
                            echo "<p>Fecha y hora de salida: " . $fechaFormateada . ", " . date('H:i', strtotime($datosVuelta[0]->getDepartureTime())) . "</p>";
                            echo "<p>Fecha y hora de llegada: " . $fechaFormateada . ", " . date('H:i', strtotime($datosVuelta[0]->getArrivalTime())) . "</p>";
                            echo "<p>Número de vuelo: " . $datosVuelta[0]->getFlightNum() . "</p>";
                            echo "<p>Duración del vuelo: " . date('H:i', strtotime($datosVuelta[0]->getTotalFlightTime())) . "</p>";
                            echo "<input type='hidden' name='vuelo-vuelta' value='" . $_POST['vuelo-vuelta'] . "'>";
                            echo "<input type='hidden' name='fecha-vuelta' value='" . $_POST['fecha-vuelta'] . "'>";
                            echo "<input type='hidden' name='precio-vuelta' value='" . $_POST['precio-vuelta'] . "'>";
                            echo "</div>";
                        }
                        ?>
                        <br>
                        <div class="passenger-info">
                            <h3>Usuario reservador:</h3>
                            <h4><?php echo $_SESSION['username'] ?></h4>
                        </div>
                </div>
                <div class="section pricing">
                    <h2>Precios</h2>
                    <ul class="flight-list">
                        <li class="flight-item">
                            <div class="flight-info">
                                <p>Vuelo 1 - <?php echo date('H:i', strtotime($datosIda[0]->getDepartureTime())); ?> Duración:
                                    <?php
                                    echo $horaFormateada = date('H:i', strtotime($datosIda[0]->getTotalFlightTime()));
                                    ?>
                                </p>
                            </div>
                            <div class="flight-price">
                                <p>Precio: <?php echo $_POST['precio-ida'] ?>€</p>
                            </div>
                        </li>
                        <?php
                        if (isset($_POST['precio-vuelta'])) {
                            echo "
                            <li class='flight-item'>
                                <div class='flight-info'>
                                    <p>Vuelo 2 - 01:00 PM - Duración: 2 horas</p>
                                </div>
                                <div class='flight-price'>
                                    <p>Precio: " . $_POST['precio-vuelta'] . "€</p>
                                </div>
                            </li>
                            ";
                        }
                        ?>
                    </ul>
                    <p class="total-price">Precio total: <?php echo $precioTotal ?>€</p>
                    <input type="hidden" name="total-passengers" value="<?php echo $_POST['passengerNumber'] ?>">
                    <button type="submit" class="boton-pagar">Pagar</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <section class="information-section">
        <div class="information-container">
            <div class="information-column">
                <h4>La compañía</h4>
                <p><a class="information-link" href="flotaVista.php">Flota</a></p>
                <p>Compromiso</p>
                <p>Empleo</p>
            </div>
            <div class="information-column">
                <h4><a class="information-link" href="aboutUsVista.php">Sobre Nosotros</a></h4>
                <p><a class="information-link" href="aboutUsVista.php">Conoce más sobre nuestra aerolínea y nuestra historia.</a></p>
            </div>
            <div class="information-column">
                <h4><a class="information-link" href="contactoVista.php">Contacto</a></h4>
                <p><a class="information-link" href="contactoVista.php">Encuentra nuestras formas de contacto y atención al cliente.</a></p>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer-content">
            <img src="../../assets/skystar_airways.png" alt="Logo de la compañía">
            <p>SkyStar Airways - Copyright Fernando Buendía Galindo 2023</p>
        </div>

    </footer>
</body>
<script src="buscadorVista.js"></script>

</html>