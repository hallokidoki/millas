<?php
      require_once('../model/conexion.php');
      require_once('../model/consultasAliados.php');
      require_once('../model/validarSesion.php');

        $claveActual=  md5($_POST['claveActual']);
        $newClave= md5($_POST ['newClave']);
        $confClave= md5($_POST ['confClave']);

        session_start();
        $identificacion = $_SESSION['Id'];
        if($claveActual == $_SESSION['Clave'] ){
          
            if($newClave == $confClave){

                $objetoConsultas = new ConsultasAliados();
                $result = $objetoConsultas->modificarClaveA($newClave, $identificacion);

            }else{
                echo "<script>alert('LA NUEVA CONTRASEÑA INGRESADA NO COINCIDE CON LA CONFIRMACION')</script>";
                echo "<script>location.href='../view/Aliados/homeAliados.php'</script>"; 
            }

        
          
        }else{

            echo "<script>alert('LA CONTRASEÑA NO COINCIDE CON LA REGISTRADA EN LA DB')</script>";
            echo "<script>location.href='../view/Aliados/homeAliados.php'</script>"; 
        }

?>