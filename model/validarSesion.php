<?php
 
 class  validarSesion{
     
    public function iniciarSesion($email, $clave){
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();


        $sql = "SELECT * FROM usuarios WHERE Email=:email"; 
        $result=$conexion->prepare($sql);

        $result->bindParam(":email", $email);

        $result->execute();

        if ($f = $result->fetch()){
    
        if ($clave == $f ['Clave'] ){

            if($f['Estado'] == "Activo"){

                session_start();
                
                $_SESSION ['Id']= $f['Identificacion'];
                $_SESSION ['Email']= $f['Email'];
                $_SESSION ['Rol']= $f['Rol'];
                $_SESSION ['Clave']= $f['Clave'];
                $_SESSION['valorp']=$f['valorPunto'];

                $_SESSION ['autenticado']= ["SI"];             


                if($f['Rol']== "Administrador"){

                    echo "<script>alert('BIENVENIDO USUARIO ADMINISTRADOR')</script>";
                    echo "<script>location.href='../view/Admin/homeAdmin.php'</script>"; 
                }

                if ($f['Rol']=="Usuario"){
                    echo "<script>alert('BIENVENIDO USUARIO')</script>";
                    echo "<script>location.href='../view/Usuario/mispuntos.php'</script>";  
                }

                if ($f['Rol']=="Aliado"){
                    echo "<script>alert('BIENVENIDO ALIADO')</script>";
                    echo "<script>location.href='../view/Aliados/homeAliados.php'</script>";  
                }


            } else {
                echo "<script>alert('CUENTA BLOQUEADA O INACTIVA, CONTACTE AL ADMIN')</script>";
                echo "<script>location.href='../view/extras/login.php'</script>";
            }

        }else {
            echo "<script>alert('CLAVE INCORRECTA')</script>";
            echo "<script>location.href='../view/extras/login.php'</script>";
        } 
        }else{
           echo "<script>alert('EMAIL NO ENCONTRADO EN EL SISTEMA')</script>";
           echo "<script>location.href='../view/extras/registro_user.php'</script>";
        }
      

    }
 public function cerrarSesion(){
    $objetoConexion=new conexion();
    $conexion=$objetoConexion->get_conexion();
    session_start();
    session_destroy();
    echo "<script>location.href='../view/extras/login.php'</script>";

 }
 
}

?>