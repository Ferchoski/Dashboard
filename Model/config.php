<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database_name = 'sk8';

$conexion = new mysqli($server,$username,$password,$database_name);

if ( $conexion->connect_error )
{
    die('Error de Conexión'. $conexion->connect_error);
}
else
{
    //echo 'Conexion OK';
}
?>
