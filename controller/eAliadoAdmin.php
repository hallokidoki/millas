<?php

    require_once('../model/conexion.php');
    require_once('../model/consultasAdmin.php');

    $id_user = $_GET['id_user'];

    $objetoConsultas = new ConsultasAdmin();
    $result = $objetoConsultas->eliminarUser($id_user);

?>