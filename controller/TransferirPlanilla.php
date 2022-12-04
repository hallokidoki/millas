<?php

    require_once('../model/conexion.php');
    require_once('../model/consultasAdmin.php');
    require_once('../model/consultasAliados.php');
    date_default_timezone_set('America/Bogota');
    $cod_planilla = $_GET['cod_planilla'];
    $transferencia="Si";
    $objetoConsultas = new ConsultasAdmin();
    $result = $objetoConsultas->TransferidaAdmin($transferencia, $cod_planilla);


    $cod_planilla = $_GET['cod_planilla'];
    $fechaActual = date('Y-m-d H:i:s');
    $Descripcion = $_GET ['Descripcion'];
    $Identificacion = $_GET ['Identificacion'];
    $Cant_Puntos = $_GET ['Cant_Puntos'];
    $valorPesos= $_GET ['valorPesos'];

    $objetoConsultas = new ConsultasAdmin();
    $result = $objetoConsultas->TransferirPlanilla($cod_planilla, $fechaActual, $Descripcion, $Identificacion, $Cant_Puntos, $valorPesos);

?>