<?php

    require_once('../model/conexion.php');
    require_once('../model/consultasAdmin.php');

    // aterrizar los valores enviados en los name del formulario atravez del metodo POST
    $tipodocumento = $_POST['Tipo_Documento'];
    $identificacion = $_POST['identificacion'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $fecha_nacimiento =$_POST['fecha_nacimiento'];
    $direccion =$_POST['direccion'];
    $ciudad =$_POST['ciudad'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];   
    $clave = $_POST['clave'];
    $rol =  $_POST ["rol"];
    $estado = $_POST["estado"];
    
    
    // validamos que las variables no esten vacias
    if (strlen($tipodocumento)>0 && strlen($identificacion)>0 && strlen($nombres)>0 && strlen($apellidos)>0 && strlen($fecha_nacimiento)>0 && strlen($direccion)>0 && strlen($ciudad)>0 && strlen($telefono)>0 && strlen($email)>0 && strlen($clave)>0) {

            // encriptamos la clave con la instruccion md5
            $claveMd = md5($clave);

            $objetoConsultas = new ConsultasAdmin();

            $result = $objetoConsultas->registrarUser($tipodocumento, $identificacion, $nombres, $apellidos, $fecha_nacimiento, $direccion, $ciudad, $telefono, $email,  $claveMd, $rol, $estado);

        // si los campos vienen vacios redireccionamos al formulario
    }else {
        
        echo "<script> alert ('POR FAVOR COMPLETE LOS CAMPOS PARA REGISTRAR UN NUEVO USUARIO')</script>";
        echo '<script> location.href="../view/Admin/registrarUser.php"</script>';
    }
?>