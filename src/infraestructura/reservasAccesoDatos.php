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
        $textoConsulta = "insert into reservations (flightID, userID, date, price) values (?,?,?,?);";
        $consulta = mysqli_prepare($conexion, $textoConsulta);
        $consulta->bind_param("ssss", $id_vuelo, $id_usuario, $fecha, $precio);
        $res = $consulta->execute();

        return $res;
    }
}
