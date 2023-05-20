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

        $aeropuertoBL=new AeropuertosReglasNegocio();
        $datosAeropuertos=$aeropuertoBL->obtener();
    ?>
</head>
<body>
    <nav class="navbar">
    <div class="navbar-center">
        <span class="navbar-brand">Skystar Airways</span>
    </div>
    <div class="navbar-right">
        <button class="login-button">Iniciar sesión</button>
    </div>
    </nav>
    <div class="search">
        <form action="" method="post">
            <div class="airport-selectors">
                <select name="dep_apt" id="dep_apt">
                <option value="null" disabled selected>Seleccione un aeropuerto de salida</option>
                <?php
                    foreach($datosAeropuertos as $aeropuerto){
                    echo '<option value="'.$aeropuerto->getICAO().'">'.$aeropuerto->getICAO().'</option>';
                    }
                ?>
                </select>
                <select name="arr_apt" id="arr_apt">
                <option value="null" disabled selected>Seleccione un aeropuerto de llegada</option>
                <?php
                    foreach($datosAeropuertos as $aeropuerto){
                    echo '<option value="'.$aeropuerto->getICAO().'">'.$aeropuerto->getICAO().'</option>';
                    }
                ?>
                </select>
            </div>
            <div class="date-selectors-search">
                <div class="dep-arrival">
                    <div class="departure">
                        <label for="fecha-salida">Fecha de salida:</label><br>
                        <input type="date" id="fecha-salida">
                    </div>
                    <div class="arrival">
                        <label for="fecha-llegada">Fecha de llegada:</label><br>
                        <input type="date" id="fecha-llegada">
                    </div>
                </div>
                <input class="search-button" type="submit" value="Buscar vuelos">
            </div>
        </form>
    </div>
</body>
</html>
