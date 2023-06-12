<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../css/buscador-vuelos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>Búsqueda</title>
    <?php
    ini_set('display_errors', 1);
    ini_set('html_errors', 1);

    session_start();
    if (isset($_SESSION['username'])) {
        $sessionActive = true;
    } else {
        $sessionActive = false;
    }


    require("../negocio/vuelosReglasNegocio.php");
    require("../negocio/aeropuertosReglasNegocio.php");

    $vuelosBL = new VuelosReglasNegocio();
    $datosVuelosIda = $vuelosBL->obtener($_POST['dep_apt'], $_POST['arr_apt'], $_POST['fecha-salida']);
    if ($_POST['fecha-vuelta'] != "") {
        $datosVuelosVuelta = $vuelosBL->obtener($_POST['arr_apt'], $_POST['dep_apt'], $_POST['fecha-vuelta']);
    }
    ?>
</head>

<body>
    <div class="container">
        <nav class="navbar">
            <div class="navbar-center">
                <span class="navbar-brand"><a href="inicioVista.php"><img src="../../assets/skystar_airways.png" alt="" srcset=""></a></span>
            </div>
            <div class="navbar-right">
                <?php
                if (!isset($_SESSION['username'])) {
                    echo '<button class="login-button"><a href="loginVista.php" class="log-in">Iniciar sesión</a></button>';
                } else if ($_SESSION['username']) {
                    echo '<p>Bienvenido, <a href="perfilVista.php">' . $_SESSION['username'] . '</a></p>';
                    echo '<A href="logoutVista.php" class="log-out">Cerrar sesión</A>';
                }
                ?>
            </div>
        </nav>
        <div class="content">
            <div class="column"></div>
            <div class="main-column">
                <form id="flight-selection-form" action="reservaVista.php" method="post">
                    <?php
                    if (empty($datosVuelosIda)) {
                        echo '<h2 style="text-align:Center;">No hay vuelos disponibles para esta ruta.</h2>';
                        echo '<h2 style="text-align:Center;">Por favor, selecciona otras fechas.</h2>';
                    } else {
                        if ($_POST['fecha-vuelta'] != "") {
                            echo '
                            <div class="leg-selector">
                                <input type="radio" id="flight-ida" name="flight-type" value="ida" checked>
                                <label for="flight-ida">Vuelo de Ida</label>
        
                                <input type="radio" id="flight-vuelta" name="flight-type" value="vuelta">
                                <label for="flight-vuelta">Vuelo de Vuelta</label>
                            </div>';
                        }
                    }
                    ?>
                    <div id="vuelos-ida">
                        <?php
                        foreach ($datosVuelosIda as $vuelo) {
                            $precio = rand(15, 50);
                            echo '<div class="flight-card ida">';
                            echo '<div class="departure-time">';
                            echo '<h2>Salida</h2>';
                            echo '<p>' . $vuelo->getDepartureTime() . '</p>';
                            echo '<p>' . $vuelo->getDeparture() . '</p>';
                            echo '<p>' . $vuelo->getFlightNum() . '</p>';
                            echo '<input style="display:none;" type="radio" id="flight-ida" name="vuelo-ida" value="' . $vuelo->getId() . '">';
                            echo '</div>';
                            echo '<div class="center-info">';
                            echo '<img src="../../assets/airplane.png" alt="airplane">';
                            echo '<p>' . $vuelo->getDate() . '</p>';
                            echo '<input type="hidden" name="fecha-ida" value="' . $vuelo->getFlightNum() . '">';
                            echo '</div>';
                            echo '<div class="arrival-time">';
                            echo '<h2>Llegada</h2>';
                            echo '<p>' . $vuelo->getArrivalTime() . '</p>';
                            echo '<p>' . $vuelo->getArrival() . '</p>';
                            echo '<p class="price">' . $precio . '€</p>';
                            echo '<input type="hidden" name="precio-ida" value="' . $precio . '">';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <div id="vuelos-vuelta" style="display: none;">
                        <?php
                        foreach ($datosVuelosVuelta as $vuelo) {
                            $precio = rand(15, 50);
                            echo '<div class="flight-card vuelta">';
                            echo '<div class="departure-time">';
                            echo '<h2>Salida</h2>';
                            echo '<p>' . $vuelo->getDepartureTime() . '</p>';
                            echo '<p>' . $vuelo->getDeparture() . '</p>';
                            echo '<p>' . $vuelo->getFlightNum() . '</p>';
                            echo '<input style="display:none;" type="radio" id="flight-' . $vuelo->getFlightNum() . '" name="vuelo-vuelta" value="' . $vuelo->getId() . '">';
                            echo '</div>';
                            echo '<div class="center-info">';
                            echo '<img src="../../assets/airplane.png" alt="airplane">';
                            echo '<p>' . $vuelo->getDate() . '</p>';
                            echo '<input type="hidden" name="fecha-vuelta" value="' . $vuelo->getFlightNum() . '">';
                            echo '</div>';
                            echo '<div class="arrival-time">';
                            echo '<h2>Llegada</h2>';
                            echo '<p>' . $vuelo->getArrivalTime() . '</p>';
                            echo '<p>' . $vuelo->getArrival() . '</p>';
                            echo '<p class="price">' . $precio . '€</p>';
                            echo '<input type="hidden" name="precio-vuelta" value="' . $precio . '">';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <input type="hidden" name="vuelo-ida" id="vuelo-ida" value="">
                    <?php
                    if (!empty($datosVuelosIda)) {
                        echo '<button type="submit" id="next-button" class="submit-button">Siguiente</button>';
                    }
                    ?>
                </form>

            </div>
            <div class="column"></div>
        </div>
    </div>
</body>
<script src="buscadorVista.js"></script>

</html>