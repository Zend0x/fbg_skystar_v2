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
        $textoConsulta = 'SELECT f.id, f.flightNum, f.date, f.departure, f.arrival, f.route, r1.origin AS departureApt, r1.destination AS arrivalApt
        FROM flights f
        JOIN routes r1 ON f.route = r1.id
        JOIN routes r2 ON r1.origin = r2.origin AND r1.destination = r2.destination
        WHERE f.date LIKE (?) AND r2.origin = (?) AND r2.destination = (?);';
        $consulta = mysqli_prepare($conexion, $textoConsulta);
        $consulta->bind_param("sss", $fecha, $origen, $destino);
        $consulta->execute();
        $results = $consulta->get_result();

        $aeropuertos = array();

        while ($myrow = $results->fetch_assoc()) {
            array_push($aeropuertos, $myrow);
        }
        return $aeropuertos;
    }

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

    function buscarPorID($id)
    {
        $conexion = mysqli_connect('localhost', 'root', '12345');
        if (mysqli_connect_errno()) {
            echo 'Error al conectar a la base de datos.' . mysqli_connect_error();
        }
        mysqli_select_db($conexion, 'skystar_airways');
        $query = "SELECT flights.flightNum, flights.date, flights.departure, flights.arrival, flights.flightDuration, 
        departure_airports.name AS departureApt, arrival_airports.name AS arrivalApt
        FROM flights
        JOIN routes ON routes.id = flights.route
        JOIN airports AS departure_airports ON departure_airports.ICAO = routes.origin
        JOIN airports AS arrival_airports ON arrival_airports.ICAO = routes.destination
        WHERE flights.id = (?);";
        $consulta = mysqli_prepare($conexion, $query);
        $consulta->bind_param("i", $id);
        $consulta->execute();
        $results = $consulta->get_result();
        $vuelo = array();
        while ($myrow = $results->fetch_assoc()) {
            array_push($vuelo, $myrow);
        }
        return $vuelo;
    }
}
