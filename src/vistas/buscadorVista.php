<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/buscador-vuelos.css">
    <title>Búsqueda</title>
    <?php
    ini_set('display_errors', 1);
    ini_set('html_errors', 1);


    require("../negocio/vuelosReglasNegocio.php");
    require("../negocio/aeropuertosReglasNegocio.php");

    $vuelosBL = new VuelosReglasNegocio();
    $datosVuelosIda = $vuelosBL->obtener($_POST['dep_apt'], $_POST['arr_apt'], $_POST['fecha-salida']);
    $datosVuelosVuelta = $vuelosBL->obtener($_POST['arr_apt'], $_POST['dep_apt'], $_POST['fecha-vuelta']);

    $aeropuertosBL = new AeropuertosReglasNegocio();
    $datosAeropuertoIda = $aeropuertosBL->obtener($_POST['dep_apt']);
    $datosAeropuertoVuelta = $aeropuertosBL->obtener($_POST['arr_apt']);
    ?>
</head>

<body>
    <div class="container">
        <nav class="navbar">
            <div class="navbar-center">
                <span class="navbar-brand"><a href="inicioVista.php"><img src="../../assets/skystar2_logo_nobg.png" alt="" srcset=""></a></span>
            </div>
            <div class="navbar-right">
                <button class="login-button">Iniciar sesión</button>
            </div>
        </nav>
        <div class="content">
            <div class="column"></div>
            <div class="main-column">
                <form id="flight-selection-form" action="reservaVista.php" method="post">
                    <div class="leg-selector">
                        <input type="radio" id="flight-ida" name="flight-type" value="ida" checked>
                        <label for="flight-ida">Vuelo de Ida</label>

                        <input type="radio" id="flight-vuelta" name="flight-type" value="vuelta">
                        <label for="flight-vuelta">Vuelo de Vuelta</label>
                    </div>

                    <div id="vuelos-ida">
                        <?php
                        foreach ($datosVuelosIda as $vuelo) {
                            echo '<div class="flight-card ida">';
                            echo '<div class="departure-time">';
                            echo '<h2>Salida</h2>';
                            echo '<p>' . $vuelo->getDepartureTime() . '</p>';
                            // echo '<p>' . $datosAeropuertoIda->getName() . '</p>';
                            echo '<p>' . $vuelo->getDeparture() . '</p>';
                            echo '</div>';
                            echo '<div class="center-info">';
                            echo '<img src="../../assets/airplane.png" alt="airplane">';
                            echo '<p class="flight-number">' . $vuelo->getFlightNum() . '</p>';
                            echo '<input style="display:none;" type="radio" id="flight-' . $vuelo->getFlightNum() . '" name="vuelo-ida" value="' . $vuelo->getId() . '">';
                            echo '</div>';
                            echo '<div class="arrival-time">';
                            echo '<h2>Llegada</h2>';
                            echo '<p>' . $vuelo->getArrivalTime() . '</p>';
                            echo '<p>' . $vuelo->getArrival() . '</p>';
                            echo '<p class="price">' . rand(15, 50) . '€</p>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <div id="vuelos-vuelta" style="display: none;">
                        <?php
                        foreach ($datosVuelosVuelta as $vuelo) {
                            echo '<div class="flight-card vuelta">';
                            echo '<div class="departure-time">';
                            echo '<h2>Salida</h2>';
                            echo '<p>' . $vuelo->getDepartureTime() . '</p>';
                            // echo '<p>' . $datosAeropuertoIda->getName() . '</p>';
                            echo '<p>' . $vuelo->getDeparture() . '</p>';
                            echo '</div>';
                            echo '<div class="center-info">';
                            echo '<img src="../../assets/airplane.png" alt="airplane">';
                            echo '<p class="flight-number">' . $vuelo->getFlightNum() . '</p>';
                            echo '<input style="display:none;" type="radio" id="flight-' . $vuelo->getFlightNum() . '" name="vuelo-vuelta" value="' . $vuelo->getId() . '">';
                            echo '</div>';
                            echo '<div class="arrival-time">';
                            echo '<h2>Llegada</h2>';
                            echo '<p>' . $vuelo->getArrivalTime() . '</p>';
                            echo '<p>' . $vuelo->getArrival() . '</p>';
                            echo '<p class="price">' . rand(15, 50) . '€</p>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <input type="hidden" name="vuelo-ida" id="vuelo-ida" value="">
                    <button type="submit" id="next-button" class="submit-button">Siguiente</button>
                </form>

            </div>
            <div class="column"></div>
        </div>
    </div>
</body>
<script src="buscadorVista.js"></script>

</html>