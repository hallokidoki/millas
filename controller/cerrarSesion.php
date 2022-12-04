<?php   

require_once('../model/conexion.php');
require_once('../model/validarSesion.php');


$objetoconsultas= new validarSesion();
$result=$objetoconsultas->cerrarSesion();






?>