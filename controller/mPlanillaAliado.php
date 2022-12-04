<?php

    require_once('../model/conexion.php');
    require_once('../model/consultasAliados.php');
    date_default_timezone_set('America/Bogota');


    // aterrizar los valores enviados en los name del formulario atravez del metodo POST
    $codplanilla = $_POST['Cod_Planilla'];
    $cantpuntos = $_POST['Cant_Puntos'];
    $descripcion = $_POST['Descripcion'];
    $fechaActual = date( 'd-m-Y H:i:s' );
    
  
    // validamos que las variables no esten vacias
    if (strlen($codplanilla)>0 && strlen($cantpuntos)>0 && strlen($descripcion)>0 && strlen($fechaActual)>0 ) {

      


         $objetoConsultas = new consultasAliados();

            $result = $objetoConsultas->modificarPlanilla($codplanilla, $cantpuntos, $descripcion, $fechaActual);
      

        // si los campos vienen vacios redireccionamos al formulario
    }else {
        echo "<script> alert ('POR FAVOR COMPLETE LOS CAMPOS PARA MODIFICAR LA PLANILLA')</script>";
        echo '<script> location.href="../view/Aliados/editarplanilaAliados.php"</script>';
    }
?>