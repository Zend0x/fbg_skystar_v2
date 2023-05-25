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


    //require("../negocio/vuelosReglasNegocio.php");

    //$vuelosBL=new VuelosReglasNegocio();
    //$datosVuelos=$vuelosBL->obtener($_POST['dep_apt'],$_POST['arr_apt']);
    ?>
</head>

<body>
    <div class="container">
        <nav class="navbar">
            <div class="navbar-center">
                <span class="navbar-brand"><a href="inicioVista.php">Skystar Airways</a></span>
            </div>
            <div class="navbar-right">
                <button class="login-button">Iniciar sesión</button>
            </div>
        </nav>
        <div class="content">
            <div class="column"></div>
            <div class="main-column">
                <div class="flight-card">
                    <div class="departure-time">
                        <h2>Salida</h2>
                        <p>10:00 AM</p>
                        <p>[apt salida]</p>
                    </div>
                    <div class="center-info">
                        <img src="../../assets/airplane.png" alt="airplane">
                        <p>[Departure time]</p>
                    </div>
                    <div class="arrival-time">
                        <h2>Llegada</h2>
                        <p>12:30 PM</p>
                        <p>[apt llegada]</p>
                        <p class="price">15€</p>
                    </div>
                </div>
                <div class="flight-card">
                    <div class="departure-time">
                        <h2>Salida</h2>
                        <p>10:00 AM</p>
                        <p>[apt salida]</p>
                    </div>
                    <div class="center-info">
                        <img src="../../assets/airplane.png" alt="airplane">
                        <p>[Departure time]</p>
                    </div>
                    <div class="arrival-time">
                        <h2>Llegada</h2>
                        <p>12:30 PM</p>
                        <p>[apt llegada]</p>
                    </div>
                </div>
                <div class="flight-card">
                    <div class="departure-time">
                        <h2>Salida</h2>
                        <p>10:00 AM</p>
                        <p>[apt salida]</p>
                    </div>
                    <div class="center-info">
                        <img src="../../assets/airplane.png" alt="airplane">
                        <p>[Departure time]</p>
                    </div>
                    <div class="arrival-time">
                        <h2>Llegada</h2>
                        <p>12:30 PM</p>
                        <p>[apt llegada]</p>
                    </div>
                </div>
                <div class="flight-card">
                    <div class="departure-time">
                        <h2>Salida</h2>
                        <p>10:00 AM</p>
                        <p>[apt salida]</p>
                    </div>
                    <div class="center-info">
                        <img src="../../assets/airplane.png" alt="airplane">
                        <p>[Departure time]</p>
                    </div>
                    <div class="arrival-time">
                        <h2>Llegada</h2>
                        <p>12:30 PM</p>
                        <p>[apt llegada]</p>
                    </div>
                </div>
            </div>
            <div class="column"></div>
        </div>
    </div>
</body>

</html>