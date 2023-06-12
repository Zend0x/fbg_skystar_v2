<?php

ini_set('display_errors', 1);
ini_set('html_errors', 1);

class usuarioAccesoDatos
{
    function __construct()
    {
    }
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
        $usernameSanitized = mysqli_real_escape_string($conexion, $username);
        $nombreSanitized = mysqli_real_escape_string($conexion, $nombre);
        $apellidosSanitized = mysqli_real_escape_string($conexion, $apellidos);
        $emailSanitized = mysqli_real_escape_string($conexion, $email);
        $telefonoSanitized = mysqli_real_escape_string($conexion, $telefono);
        $consulta->bind_param("ssssss", $usernameSanitized, $hash, $nombreSanitized, $apellidosSanitized, $emailSanitized, $telefonoSanitized);
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
    function getUserInfo($username)
    {
        $conexion = mysqli_connect('localhost', 'root', '12345');
        if (mysqli_connect_errno()) {
            echo 'Error al conectar a la base de datos.' . mysqli_connect_error();
        }
        mysqli_select_db($conexion, 'skystar_airways');
        $textoConsulta = "select name,surnames,email,phoneNum from users where username = ?;";
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
        return $myrow;
    }
}
