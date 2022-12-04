<?php

    require_once('../model/conexion.php');
    require_once('../model/consultasAliados.php');

    $cod_planilla = $_GET['cod_planilla'];

    $objetoConsultas = new consultasAliados();
    $result = $objetoConsultas->eliminarPlanilla($cod_planilla);

?>