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

    //$vuelosBL=new VuelosReglasNegocio();
    //$datosVuelos=$vuelosBL->obtener($_POST['dep_apt'],$_POST['arr_apt']);
    ?>
</head>

<body>
    <div class="container">
        <nav class="navbar">
            <div class="navbar-center">
                <span class="navbar-brand">Skystar Airways</span>
            </div>
            <div class="navbar-right">
                <button class="login-button">Iniciar sesión</button>
            </div>
        </nav>
        <div class="content">
            <div class="column"></div>
            <div class="main-column">

            </div>
            <div class="column"></div>
        </div>
    </div>
</body>

</html>