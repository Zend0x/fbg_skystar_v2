<?php

ini_set('display_errors', 1);
ini_set('html_errors', 1);

class VuelosAccesoDatos{
    function __construct(){ 
    }

    function buscarVuelos($origen,$destino){
        $conexion=mysqli_connect('localhost','root','12345');
        if(mysqli_connect_errno()){
            echo 'Error al conectar a la base de datos.'.mysqli_connect_error();
        }
        mysqli_select_db($conexion,'skystar_airways');
        $textoConsulta="select flightNum,departure,route,
        (select origin from routes where origin=(?) and destination=(?)) as departureApt,
        (select destination from routes where origin=(?) and destination=(?)) as arrivalApt
        from flights where route=(select id from routes where origin=(?) and destination=(?));";
        $consulta=mysqli_prepare($conexion,$textoConsulta);
        $consulta->bind_param("ssssss",$origen,$destino,$origen,$destino,$origen,$destino);
        $consulta->execute();
        $results=$consulta->get_result();

        $aeropuertos=array();

        while($myrow=$results->fetch_assoc()){
            array_push($aeropuertos,$myrow);
        }
        return $aeropuertos;
    }
}