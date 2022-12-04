<?php

require_once('../model/conexion.php');
require_once('../model/validarSesion.php');

 $email=$_POST['email'];
 $clave= md5($_POST['clave']);

    $objetoValidar = new validarSesion();
    $result = $objetoValidar->iniciarSesion($email, $clave);
?>