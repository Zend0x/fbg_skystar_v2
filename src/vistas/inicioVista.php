<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/index.css">
    <title>Skystar Airways</title>
    <?php
    ini_set('display_errors', 1);
    ini_set('html_errors', 1);

    require("../negocio/aeropuertosReglasNegocio.php");

    $aeropuertoBL = new AeropuertosReglasNegocio();
    $datosAeropuertos = $aeropuertoBL->obtener();
    ?>
</head>

<body>
    <nav class="navbar">
        <div class="navbar-center">
            <span class="navbar-brand"><img src="../../assets/skystar2_logo_nobg.png" alt="" srcset=""></span>
        </div>
        <div class="navbar-right">
            <button class="login-button"><a href="loginVista.php" class="log-in">Iniciar sesión</a></button>
        </div>
    </nav>
    <div class="content">
        <div class="search">
            <form action="buscadorVista.php" method="post" id="search-form" onchange="checkFormValues()">
                <div class="trip-type">
                    <input type="radio" name="trip-type" id="one-way" id="one-way" value="oneway">
                    <label for="one-way">Solo ida</label>
                    <input type="radio" name="trip-type" id="round-trip" id="round-trip" value="roundtrip" checked>
                    <label for="round-trip">Ida y vuelta</label>
                </div>
                <div class="airport-selectors">
                    <select name="dep_apt" id="dep_apt" onchange="selectValues('arr_apt',this.value)">
                        <option value="null" disabled selected>Seleccione un aeropuerto de salida</option>
                        <?php
                        foreach ($datosAeropuertos as $aeropuerto) {
                            echo '<option value="' . $aeropuerto->getICAO() . '" >' . $aeropuerto->getICAO() . '</option>';
                        }
                        ?>
                    </select>
                    <button type="button" onclick="intercambiarValores()" class="interchange-airports"><img src="../../assets/arrow-left-right.svg" alt="change"></button>
                    <select name="arr_apt" id="arr_apt" onchange="selectValues('dep_apt',this.value)">
                        <option value="null" disabled selected>Seleccione un aeropuerto de llegada</option>
                        <?php
                        foreach ($datosAeropuertos as $aeropuerto) {
                            echo '<option value="' . $aeropuerto->getICAO() . '">' . $aeropuerto->getICAO() . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="date-selectors-search">
                    <div class="dep-arrival">
                        <div class="departure">
                            <label for="fecha-salida">Fecha de salida:</label><br>
                            <input type="date" id="fecha-salida" name="fecha-salida">
                        </div>
                        <div class="arrival">
                            <label for="fecha-llegada" id="vuelta-label">Fecha de vuelta:</label><br>
                            <input type="date" id="fecha-vuelta" name="fecha-vuelta">
                        </div>
                    </div>
                    <input id="submit-button" class="disabled-button" disabled type="submit" value="Buscar vuelos">
                </div>
            </form>
        </div>
    </div>
</body>
<script src="inicioVista.js"></script>

</html>