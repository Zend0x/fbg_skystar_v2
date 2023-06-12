<?php

ini_set('display_errors', 1);
ini_set('html_errors', 1);

class reservasAccesoDatos
{

    function __construct()
    {
    }

    function insertar($id_vuelo, $id_usuario, $fecha, $precio)
    {
        $conexion = mysqli_connect('localhost', 'root', '12345');
        if (mysqli_connect_errno()) {
            echo 'Error al conectar a la base de datos.' . mysqli_connect_error();
        }
        mysqli_select_db($conexion, 'skystar_airways');
        $textoConsulta = "insert into reservations (flight, user, date, price) values (?,?,?,?);";
        $consulta = mysqli_prepare($conexion, $textoConsulta);
        $consulta->bind_param("ssss", $id_vuelo, $id_usuario, $fecha, $precio);
        $res = $consulta->execute();

        $lastInsertId = mysqli_insert_id($conexion);

        return $lastInsertId;
    }

    function getById($username)
    {
        $conexion = mysqli_connect('localhost', 'root', '12345');
        if (mysqli_connect_errno()) {
            echo 'Error al conectar a la base de datos.' . mysqli_connect_error();
        }
        mysqli_select_db($conexion, 'skystar_airways');
        $textoConsulta = "SELECT res.id, res.user, res.flight, res.date, res.price, a1.name AS origin_airport, a2.name AS destination_airport, f.flightNum as 'flightNumber'
        FROM reservations res
        JOIN flights f ON res.flight = f.id
        JOIN routes r ON f.route = r.id
        JOIN airports a1 ON r.origin = a1.icao
        JOIN airports a2 ON r.destination = a2.icao
        WHERE res.user = (?);";
        $consulta = mysqli_prepare($conexion, $textoConsulta);
        $consulta->bind_param("s", $username);
        $consulta->execute();
        $res = $consulta->get_result();
        $reservas = array();
        while ($row = mysqli_fetch_assoc($res)) {
            $reservas[] = $row;
        }
        return $reservas;
    }
}
