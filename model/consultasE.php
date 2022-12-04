<?php
    
    class ConsultasE {
        
        public function registrarUserE($tipodocumento, $identificacion, $nombres, $apellidos, $fecha_nacimiento, $direccion, $ciudad, $telefono, $email, $claveMd, $rol, $estado){

            // conectamos con la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();
           
            $sql = "SELECT * FROM usuarios WHERE identificacion=:identificacion OR email=:email";

            $result = $conexion->prepare($sql);

            $result->bindParam(":identificacion", $identificacion);
            $result->bindParam(":email", $email);

            $result->execute();

            $f = $result->fetch();

            if ($f) {
                echo "<script> alert ('EL USUARIO YA SE ENCUENTRA REGISTRADO')</script>";
                echo '<script> location.href="../view/extras/registro_user.php"</script>';
            }else {

                // conectamos con la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();
           
            $sql = "INSERT INTO usuarios (Tipo_Documento, Identificacion, Nombres, Apellidos, Fecha_Nacimiento, Direccion, Ciudad, Telefono, Email, Clave, Rol, Estado)
             VALUES (:tipodocumento, :identificacion, :nombres, :apellidos, :fecha_nacimiento, :direccion, :ciudad, :telefono, :email, :claveMd, :rol, :estado)";

            $result = $conexion->prepare($sql);                     
            $result->bindParam(':tipodocumento', $tipodocumento);
            $result->bindParam(':identificacion', $identificacion);
            $result->bindParam(':nombres', $nombres);
            $result->bindParam(':apellidos', $apellidos);
            $result->bindParam(':fecha_nacimiento', $fecha_nacimiento);
            $result->bindParam(':direccion', $direccion);
            $result->bindParam(':ciudad', $ciudad);
            $result->bindParam(':telefono', $telefono);
            $result->bindParam(':email', $email);            
            $result->bindParam(':claveMd', $claveMd);
            $result->bindParam(':rol', $rol);
            $result->bindParam(':estado', $estado);
          
            $result->execute();
            echo "<script> alert ('REGISTRO EXITOSO')</script>";
            echo '<script> location.href="../view/extras/login.php"</script>';

            }
        


        }
        

    }

?>