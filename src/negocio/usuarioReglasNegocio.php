<?php

ini_set('display_errors', 1);
ini_set('html_errors', 1);

require_once("../infraestructura/usuarioAccesoDatos.php");

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

    function init($username, $password, $nombre, $apellidos, $email, $telefono)
    {
        $this->_USERNAME = $username;
        $this->_PASSWORD = $password;
        $this->_NOMBRE = $nombre;
        $this->_APELLIDOS = $apellidos;
        $this->_EMAIL = $email;
        $this->_TELEFONO = $telefono;
    }
    function init_search($username)
    {
        $this->_USERNAME = $username;
    }


    function insertarUsuario($username, $password, $nombre, $apellidos, $email, $telefono)
    {
        $usuarioDAL = new usuarioAccesoDatos();
        $usuarioDAL->insertarUsuario($username, $password, $nombre, $apellidos, $email, $telefono);
        var_dump($usuarioDAL);
    }

    function login($username, $hashedPassword)
    {
        $userDAL = new usuarioAccesoDatos();
        $res = $userDAL->login($username, $hashedPassword);

        return $res;
    }
    function getUserInfo($username)
    {
        $userDAL = new usuarioAccesoDatos();
        $res = $userDAL->getUserInfo($username);

        return $res;
    }
}
