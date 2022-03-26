<?php
    header ('Content-type: text/html; charset=utf-8');
    require_once "lib/nusoap.php";
    function getNombreAlumnos($datos){
        if($datos == "NombreAlumnos") {
            return join (",", array(
                "Cesar",
                "Citlaly",
                "Juan Jose",
                "Julio Cesar",
                "Ricardo",
                "Esther",
                "Ronny"));
        }
        else{
            return "No hay alumnos";
        }
    }

    $server = new soap_server();//creamos Instancia de SOAP
    $server->register("getNombreAlumnos");// Indica el metodo o funcion a devolver
    if (!isset($HTTP_RAW_POST_DATA) )$HTTP_RAW_POST_DATA=file_get_contents('php://input');
    $server->service($HTTP_RAW_POST_DATA);    
?>