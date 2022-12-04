<?php
    
    class ConsultasAdmin {
        
        public function registrarUser($tipodocumento, $identificacion, $nombres, $apellidos, $fecha_nacimiento, $direccion, $ciudad, $telefono, $email, $claveMd, $rol, $estado){

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
                echo "<script> alert ('EL USUARIO A REGISTRAR YA SE ENCUENTRA EN EL SISTEMA')</script>";
                echo '<script> location.href="../view/Admin/registrarUser.php"</script>';
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
            $result->bindParam(':email', $email);
            $result->bindParam(':telefono', $telefono);
            $result->bindParam(':claveMd', $claveMd);
            $result->bindParam(':rol', $rol);
            $result->bindParam(':estado', $estado);

            $result->execute();
            echo "<script> alert ('REGISTRO EXITOSO')</script>";
            echo '<script> location.href="../view/Admin/registrarUser.php"</script>';

            }
        }

        public function mostrarUsers(){
            $f = null;
            // conectamos con la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT * FROM  user ";
            $result = $conexion -> prepare ($sql);
            $result -> execute();

            while ($consulta = $result -> fetch()){
                $f[] = $consulta;

            }
                return $f;

        }

        public function mostrarUser($id_user){
            $f = null;
            // conectamos con la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT * FROM  user  WHERE Identificacion=:id_user";
            $result = $conexion -> prepare ($sql);
            $result->bindParam(':id_user', $id_user);
            $result -> execute();

            while ($consulta = $result -> fetch()){
                $f[] = $consulta;

            }
                return $f;

        }

        public function modificarUser($tipodocumento, $identificacion, $nombres, $apellidos, $email, $telefono, $rol, $estado){
             // conectamos con la clase conexion
             $objetoConexion = new Conexion();
             $conexion = $objetoConexion->get_conexion();

             $sql ="UPDATE user SET Tipo_Documento=:tipodocumento, Identificacion=:identificacion, Nombres=:nombres, Apellidos=:apellidos, Email=:email, Telefono=:telefono, Rol=:rol, Estado=:estado WHERE Identificacion=:identificacion";
             $result = $conexion->prepare($sql);
             $result->bindParam(':tipodocumento', $tipodocumento);
             $result->bindParam(':identificacion', $identificacion);
             $result->bindParam(':nombres', $nombres);
             $result->bindParam(':apellidos', $apellidos);
             $result->bindParam(':email', $email);
             $result->bindParam(':telefono', $telefono);
             $result->bindParam(':rol', $rol);
             $result->bindParam(':estado', $estado);
 
             $result->execute();
             echo "<script> alert ('ACTUALIZACION EXITOSA')</script>";
             echo '<script> location.href="../view/Admin/registrarUser.php"</script>';
 
        }

        public function eliminarUser($id_user){
              // conectamos con la clase conexion
              $objetoConexion = new Conexion();
              $conexion = $objetoConexion->get_conexion();
              
              $sql ="DELETE FROM user WHERE Identificacion=:id_user";
              $result =$conexion->prepare($sql);

              $result->bindParam(':id_user', $id_user);
              $result->execute();
              echo "<script> alert ('EL USUARIO HA SIDO ELIMINADO DE MANERA EXITOSA')</script>";
              echo '<script> location.href="../view/Admin/verUsers.php"</script>';


        }  
    }

?>