<?php   

session_start();
    if(!isset($_SESSION['autenticado'])) {
        echo "<script>alert('DEBE INICIAR SESION PARA ACCEDER!!')</script>";
        echo "<script>location.href='../extras/login.php'</script>";
    }
    if ($_SESSION['Rol']!="Usuario"){

        echo "<script>alert('TU ROL NO TIENE PERMISOS!!')</script>";
        echo "<script>location.href='../extras/login.php'</script>";

    }



?>