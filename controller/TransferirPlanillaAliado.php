<?php

    require_once('../model/conexion.php');
    require_once('../model/consultasAliados.php');
    $cod_planilla = $_GET['cod_planilla'];
    $transferencia="En Espera";
    $objetoConsultas = new ConsultasAliados();
    $result = $objetoConsultas->TransferidaAliado($transferencia, $cod_planilla);


   
?>