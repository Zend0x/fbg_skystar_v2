<?php

ini_set('display_errors', 1);
ini_set('html_errors', 1);

class AeropuertosAccesoDatos
{
    function __construct()
    {
    }

    function getAeropuertos()
    {
        $conexion = mysqli_connect('localhost', 'root', '12345');
        if (mysqli_connect_errno()) {
            echo 'Error al conectar a la base de datos.' . mysqli_connect_error();
        }
        mysqli_select_db($conexion, 'skystar_airways');
        $textoConsulta = 'SELECT name, icao FROM airports';
        $consulta = mysqli_prepare($conexion, $textoConsulta);
        $consulta->execute();
        $results = $consulta->get_result();

        $aeropuertos = array();

        while ($myrow = $results->fetch_assoc()) {
            array_push($aeropuertos, $myrow);
        }
        return $aeropuertos;
    }
    function buscarAeropuerto($icao)
    {
        $conexion = mysqli_connect('localhost', 'root', '12345');
        if (mysqli_connect_errno()) {
            echo 'Error al conectar a la base de datos.' . mysqli_connect_error();
        }
        mysqli_select_db($conexion, 'skystar_airways');
        $textoConsulta = 'SELECT name, city, country FROM airports where icao = (?)';
        $consulta = mysqli_prepare($conexion, $textoConsulta);
        $consulta->bind_param("s", $icao);
        $consulta->execute();
        $results = $consulta->get_result();

        $aeropuertos = array();

        while ($myrow = $results->fetch_assoc()) {
            array_push($aeropuertos, $myrow);
        }
        return $aeropuertos;
    }
}
