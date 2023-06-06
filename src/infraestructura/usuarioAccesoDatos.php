<?php

ini_set('display_errors', 1);
ini_set('html_errors', 1);

//Una clase usuarioAccesoDatos que se conecte a la base de datos y tenga una función insertarUsuario que reciba los datos de un usuario y los inserte en la base de datos
class usuarioAccesoDatos
{
    function __construct()
    {
    }
    //Crear la función insertarUsuario que reciba los datos de un usuario y los inserte en la base de datos
    function insertarUsuario($username, $password, $nombre, $apellidos, $email, $telefono)
    {
        $conexion = mysqli_connect('localhost', 'root', '12345');
        var_dump($conexion);
        if (mysqli_connect_errno()) {
            echo 'Error al conectar a la base de datos.' . mysqli_connect_error();
        }
        mysqli_select_db($conexion, 'skystar_airways');
        $textoConsulta = "insert into users (username, password, name, surnames, email, phoneNum) values (?,?,?,?,?,?);";
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $consulta = mysqli_prepare($conexion, $textoConsulta);
        $consulta->bind_param("ssssss", $username, $hash, $nombre, $apellidos, $email, $telefono);
        $res = $consulta->execute();

        return $res;
    }

    function login($username, $password)
    {
        $conexion = mysqli_connect('localhost', 'root', '12345');
        if (mysqli_connect_errno()) {
            echo 'Error al conectar a la base de datos.' . mysqli_connect_error();
        }
        mysqli_select_db($conexion, 'skystar_airways');
        $textoConsulta = "select username, password from users where username = ?;";
        $sanitized_user = mysqli_real_escape_string($conexion, $username);
        $consulta = mysqli_prepare($conexion, $textoConsulta);
        $consulta->bind_param("s", $sanitized_user);
        $consulta->execute();
        $results = $consulta->get_result();
        if ($results->num_rows == 0) {
            return false;
        }
        if ($results->num_rows > 1) {
            return false;
        }
        $myrow = $results->fetch_assoc();
        $x = $myrow['password'];
        if (password_verify($password, $x)) {
            return true;
        } else {
            return false;
        }
    }
}
