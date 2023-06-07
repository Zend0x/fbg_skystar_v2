<?php

ini_set('display_errors', 1);
ini_set('html_errors', 1);

class VuelosAccesoDatos
{
    function __construct()
    {
    }

    function buscarVuelos($origen, $destino, $fecha)
    {
        $conexion = mysqli_connect('localhost', 'root', '12345');
        if (mysqli_connect_errno()) {
            echo 'Error al conectar a la base de datos.' . mysqli_connect_error();
        }
        mysqli_select_db($conexion, 'skystar_airways');
        $textoConsulta = "select id,flightNum,departure,arrival,route,
        (select origin from routes where origin=(?) and destination=(?)) as departureApt,
        (select destination from routes where origin=(?) and destination=(?)) as arrivalApt
        from flights where date LIKE (?) AND route=(select id from routes where origin=(?) and destination=(?));";
        $consulta = mysqli_prepare($conexion, $textoConsulta);
        $consulta->bind_param("sssssss", $origen, $destino, $origen, $destino, $fecha, $origen, $destino);
        $consulta->execute();
        $results = $consulta->get_result();

        $aeropuertos = array();

        while ($myrow = $results->fetch_assoc()) {
            array_push($aeropuertos, $myrow);
        }
        return $aeropuertos;
    }

    // funcion de insertarVuelos con parámetros de origen y destino

    function insertarVuelos($origen, $destino)
    {
        $conexion = mysqli_connect('localhost', 'root', '12345');
        if (mysqli_connect_errno()) {
            echo 'Error al conectar a la base de datos.' . mysqli_connect_error();
        }
        mysqli_select_db($conexion, 'skystar_airways');
        $textoConsulta = "insert into flights (route) values ((select id from routes where origin=(?) and destination=(?)));";
        $consulta = mysqli_prepare($conexion, $textoConsulta);
        $consulta->bind_param("ss", $origen, $destino);
        $consulta->execute();
        $results = $consulta->get_result();

        $aeropuertos = array();

        while ($myrow = $results->fetch_assoc()) {
            array_push($aeropuertos, $myrow);
        }
        return $aeropuertos;
    }
}
