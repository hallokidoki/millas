<?php

    require_once('../model/conexion.php');
    require_once('../model/consultasAliados.php');
    require_once('../model/validarSesion.php');
    date_default_timezone_set('America/Bogota');
    session_start();
    $valor=$_SESSION['valorp'];
   

    // aterrizar los valores enviados en los name del formulario atravez del metodo POST
    $Cantidad_puntos = $_POST['Cant_Puntos'];
    $Id_usuario =$_POST['Id_usuario'];
    $id_aliado= $_POST['id_aliado'];
    $descripcion=$_POST['Descripcion'];
    $fechaActual = date('Y-m-d H:i:s');
    $valorPesos=$Cantidad_puntos*$valor;
    $transferencia="No";
           
    
    // validamos que las variables no esten vacias
    if (strlen($Cantidad_puntos)>0 && strlen($id_aliado)>0 && strlen($Id_usuario)>0 && strlen($descripcion)>0){

            $objetoConsultas = new consultasAliados();

            $result = $objetoConsultas->regplanilla($Cantidad_puntos, $Id_usuario, $id_aliado,$descripcion,$fechaActual, $valorPesos, $transferencia);

        // si los campos vienen vacios redireccionamos al formulario
    }else {
        
        //echo "<script> alert ('POR FAVOR COMPLETE LOS CAMPOS PARA REGISTRAR UNA NUEVA PLANILLA')</script>";
        //echo '<script> location.href="../view/Aliados/regplanilla.php"</script>';
    }
?>