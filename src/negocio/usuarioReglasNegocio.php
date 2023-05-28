<?php

ini_set('display_errors', 1);
ini_set('html_errors', 1);

require("../infraestructura/usuarioAccesoDatos.php");

// Una clase usuarioReglasNegocio con una función insertarUsuario que recibe los datos de un usuario y los inserta en la base de datos a través de la clase usuarioAccesoDatos
class usuarioReglasNegocio
{
    private $_USERNAME;
    private $_PASSWORD;
    private $_NOMBRE;
    private $_APELLIDOS;
    private $_EMAIL;
    private $_TELEFONO;

    function __construct()
    {
    }

    //Crear función init a la que se le pasen los valores (username, nombre, apellidos, email, teléfono y luego se asocien a las variables privadas con un $this
    function init($username, $password, $nombre, $apellidos, $email, $telefono)
    {
        $this->_USERNAME = $username;
        $this->_PASSWORD = $password;
        $this->_NOMBRE = $nombre;
        $this->_APELLIDOS = $apellidos;
        $this->_EMAIL = $email;
        $this->_TELEFONO = $telefono;
    }


    function insertarUsuario($username, $password, $nombre, $apellidos, $email, $telefono)
    {
        $usuarioDAL = new usuarioAccesoDatos();
        $usuarioDAL->insertarUsuario($username, $password, $nombre, $apellidos, $email, $telefono);
        var_dump($usuarioDAL);
    }
}
