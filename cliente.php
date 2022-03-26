
<?php
header ('Content-type: text/html; charset=utf-8');
require_once "lib/nusoap.php";
$cliente = new nusoap_client("http://localhost/practica4ceva/server.php");

$error = $cliente ->getError();
if  ($error) {
    echo "<h2>Contructor error</h2><pre>" . $error . "</pre>";
}
$result = $cliente->call("getNombreAlumnos", array("datos" => "NombreAlumnos"));
if ($cliente->fault) { // Chekeamos una falla al momento de llamar el metodo
    echo " <h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
}
else { //No hay error al llamar el metodo
    $error = $cliente->getError();
    if ($error){
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    }
    else {
        echo "<h2>Nombre Alumnos</h2><pre>";
        echo $result;
        echo "</pre>";
    }
}
?>