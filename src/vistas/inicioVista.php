<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/index.css">
    <link rel="shortcut icon" href="../../assets/favicons/favicon.ico" type="image/x-icon">
    <title>Skystar Airways</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <?php
    ini_set('display_errors', 1);
    ini_set('html_errors', 1);

    require("../negocio/aeropuertosReglasNegocio.php");

    try {
        $aeropuertoBL = new AeropuertosReglasNegocio();
        $datosAeropuertos = $aeropuertoBL->obtener();
    } catch (Exception $e) {
        $databaseError = true;
    }
    session_start();
    if (isset($_SESSION['username'])) {
        $sessionActive = true;
    } else {
        $sessionActive = false;
    }
    ?>
</head>

<body>
    <?php
    if (isset($databaseError)) {
        echo '<nav class="navbar-error">';
        echo '<h1 class="error">Ha ocurrido un error en la base de datos</h1>';
        echo '</nav>';
    } else {
        echo '
            <nav class="navbar">
                <div class="navbar-center">
                    <span class="navbar-brand"><img src="../../assets/skystar_airways.png" alt="" draggable="false"></span>
                    <div class="search">
                        <form action="buscadorVista.php" method="post" id="search-form">
                            <div class="trip-type">
                                <input type="radio" name="trip-type" id="one-way" id="one-way" value="oneway">
                                <label for="one-way">Solo ida</label>
                                <input type="radio" name="trip-type" id="round-trip" id="round-trip" value="roundtrip" checked>
                                <label for="round-trip">Ida y vuelta</label>
                            </div>
                            <div class="airport-selectors">
                                <select name="dep_apt" id="dep_apt" onchange="selectValues(\'arr_apt\',this.value)" class="apt-selector" required>
                                    <option value="null" disabled selected>Seleccione un aeropuerto de salida</option>';
        foreach ($datosAeropuertos as $aeropuerto) {
            echo '<option value="' . $aeropuerto->getICAO() . '" >' . $aeropuerto->getName() . '</option>';
        }
        echo '
                                </select>
                                <button type="button" onclick="intercambiarValores()" class="interchange-airports"><img src="../../assets/arrow-left-right.svg" alt="change"></button>
                                <select name="arr_apt" id="arr_apt" onchange="selectValues(\'dep_apt\',this.value)" class="apt-selector" required>
                                    <option value="null" disabled selected>Seleccione un aeropuerto de llegada</option>';
        foreach ($datosAeropuertos as $aeropuerto) {
            echo '<option value="' . $aeropuerto->getICAO() . '">' . $aeropuerto->getName() . '</option>';
        }
        echo '
                                </select>
                            </div>
                            <div class="date-selectors-search">
                                <div class="dep-arrival">
                                    <div class="departure">
                                        <label for="fecha-salida">Fecha de salida:</label><br>
                                        <input type="date" id="fecha-salida" name="fecha-salida" required>
                                    </div>
                                    <div class="arrival">
                                        <label for="fecha-llegada" id="vuelta-label">Fecha de vuelta:</label><br>
                                        <input type="date" id="fecha-vuelta" name="fecha-vuelta" required>
                                    </div>
                                </div>
                                <div class="pasajeros">
                                <label for="passengers">Pasajeros:</label><br>
                                <select name="passengers" id="passengers">
                                    <option value="1" selected>1</option>
                                    <option value="2">2 </option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                                </div>
                                <input id="submit-button" class="search-button" type="submit" value="Buscar vuelos">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="navbar-right">';
        if (!$sessionActive) {
            echo '<button class="login-button"><a href="loginVista.php" class="log-in">Iniciar sesión</a></button>';
        } else if ($sessionActive) {
            echo '<p>Bienvenido, <a href="perfilVista.php" class="welcome">' . $_SESSION['username'] . '</a></p>';
            echo '<A href="logoutVista.php" class="log-out">Cerrar sesión</A>';
        }
        echo '
                </div>
            </nav>';
    }
    ?>
    <div class="content">
        <h1 class="content-title">¿A dónde quieres volar?</h1>
        <div class="grid-container">
            <div class="card-title">
                <h3 class="title">Hong Kong</h3>
                <div class="card">
                    <img class="background-image" src="../../assets/hongkong_vic_harb.jpg" alt="Imagen 1">
                    <div class="content">
                        <h3>Desde 400€</h3>
                    </div>
                </div>
            </div>
            <div class="card-title">
                <h3 class="title">Seúl, Corea del Sur</h3>
                <div class="card">
                    <img class="background-image" src="../../assets/nandaemum.webp" alt="Imagen 2">
                    <div class="content">
                        <h3>Desde 500€</h3>
                    </div>
                </div>
            </div>
            <div class="card-title">
                <h3 class="title">Tashkent, Uzbekistán</h3>
                <div class="card">
                    <img class="background-image" src="../../assets/hazrat_imam_toshkent.jpg" alt="Imagen 3">
                    <div class="content">
                        <h3 class="ozbecha">Desde 250€</h3>
                    </div>
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
                <h4>Contacto</a></h4>
                <p>Atención al cliente: 971 700 960
                    <br>
                    Email: soporte@skystar.mo</a>
                </p>
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
<script src="inicioVista.js"></script>

</html>