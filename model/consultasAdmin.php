<?php
    
    class ConsultasAdmin {
        
        public function verPerfil($Email){
            $f=null;
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT * from usuarios where Email=:Email";
            $result = $conexion->prepare ($sql);
            $result->bindParam(':Email', $Email);
            $result->execute();

            while ($resultado=$result->fetch()){
                $f[] = $resultado;
            }
            return $f;
        }
        


        public function registrarUser($tipodocumento, $identificacion, $nombres, $apellidos, $fecha_nacimiento, $direccion, $ciudad, $telefono, $email, $claveMd, $rol, $estado, $foto){

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

            $sql = "INSERT INTO usuarios (Tipo_Documento, Identificacion, Nombres, Apellidos, Fecha_Nacimiento, Direccion, Ciudad, Telefono, Email, Clave, Rol, Estado, foto) 
            VALUES (:tipodocumento, :identificacion, :nombres, :apellidos, :fecha_nacimiento, :direccion, :ciudad, :telefono, :email, :claveMd, :rol, :estado, :foto)";

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
            $result->bindParam(':foto', $foto);

            $result->execute();
            echo "<script> alert ('REGISTRO EXITOSO')</script>";
            echo '<script> location.href="../view/Admin/registrarUser.php"</script>';

            }
        }
        public function registrarAliado($tipodocumento, $identificacion, $nombres,   $direccion, $ciudad, $telefono, $email,  $claveMd, $rol, $estado, $foto,$valorpunto){

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
                echo "<script> alert ('EL ALIADO A REGISTRAR YA SE ENCUENTRA EN EL SISTEMA')</script>";
                echo '<script> location.href="../view/Admin/registrarAliado.php"</script>';
            }else {

                // conectamos con la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "INSERT INTO usuarios (Tipo_Documento, Identificacion, Nombres,  Direccion, Ciudad, Telefono, Email, Clave, Rol, Estado, foto,valorPunto) 
            VALUES (:tipodocumento, :identificacion,:nombres, :direccion, :ciudad, :telefono, :email, :claveMd, :rol, :estado, :foto,:valorPunto)";

            $result = $conexion->prepare($sql);
            $result->bindParam(':tipodocumento', $tipodocumento);
            $result->bindParam(':identificacion', $identificacion);
            $result->bindParam(':nombres', $nombres);
            $result->bindParam(':direccion', $direccion);
            $result->bindParam(':ciudad', $ciudad);
            $result->bindParam(':telefono', $telefono);
            $result->bindParam(':email', $email);           
            $result->bindParam(':claveMd', $claveMd);
            $result->bindParam(':rol', $rol);
            $result->bindParam(':estado', $estado);
            $result->bindParam(':foto', $foto);
            $result->bindParam(':valorPunto', $valorpunto);   
            $result->execute();
            echo "<script> alert ('REGISTRO ALIADO EXITOSO ')</script>";
            echo '<script> location.href="../view/Admin/registrarAliado.php"</script>';

            }
        }
        public function mostrarUsers(){
            $f = null;
            // conectamos con la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT * FROM  usuarios where Rol='Usuario'";
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

            $sql = "SELECT * FROM  usuarios  WHERE Identificacion=:id_user";
            $result = $conexion -> prepare ($sql);
            $result->bindParam(':id_user', $id_user);
            $result -> execute();

            while ($consulta = $result -> fetch()){
                $f[] = $consulta;

            }
                return $f;

        }

        public function modificarUser($tipodocumento, $identificacion, $nombres, $apellidos, $fecha_nacimiento, $direccion, $ciudad, $telefono, $email, $rol, $estado, $foto){
             // conectamos con la clase conexion
             $objetoConexion = new Conexion();
             $conexion = $objetoConexion->get_conexion();

             $sql ="UPDATE usuarios SET Tipo_Documento=:tipodocumento, Identificacion=:identificacion, Nombres=:nombres, Apellidos=:apellidos, Fecha_Nacimiento=:fecha_nacimiento, Direccion=:direccion, Ciudad=:ciudad, Telefono=:telefono, Email=:email, Rol=:rol, Estado=:estado, foto=:foto WHERE Identificacion=:identificacion";
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
             $result->bindParam(':rol', $rol);
             $result->bindParam(':estado', $estado);
             $result->bindParam(':foto', $foto);
 
             $result->execute();
             echo "<script> alert ('ACTUALIZACION EXITOSA')</script>";
             echo '<script> location.href="../view/Admin/registrarUser.php"</script>';
 
        }
        public function mostrarAliados(){
            $f = null;
            // conectamos con la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT * FROM  usuarios  WHERE Rol='Aliado'";
            $result = $conexion -> prepare ($sql);
            $result -> execute();

            while ($consulta = $result -> fetch()){
                $f[] = $consulta;

            }
                return $f;

        }

        public function mostrarAliado($id_user){
            $f = null;
            // conectamos con la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT * FROM  usuarios  WHERE Identificacion=:id_user";
            $result = $conexion -> prepare ($sql);
            $result->bindParam(':id_user', $id_user);
            $result -> execute();

            while ($consulta = $result -> fetch()){
                $f[] = $consulta;

            }
                return $f;

        }

        public function modificarAliado($tipodocumento, $identificacion, $nombres,$direccion, $ciudad, $telefono, $email,$foto){
             // conectamos con la clase conexion
             $objetoConexion = new Conexion();
             $conexion = $objetoConexion->get_conexion();

             $sql ="UPDATE usuarios SET Tipo_Documento=:tipodocumento, Identificacion=:identificacion, Nombres=:nombres,Direccion=:direccion, Ciudad=:ciudad, Telefono=:telefono, Email=:email,foto=:foto WHERE Identificacion=:identificacion";
             $result = $conexion->prepare($sql);
             $result->bindParam(':tipodocumento', $tipodocumento);
             $result->bindParam(':identificacion', $identificacion);
             $result->bindParam(':nombres', $nombres);
             $result->bindParam(':direccion', $direccion);
             $result->bindParam(':ciudad', $ciudad);
             $result->bindParam(':telefono', $telefono);
             $result->bindParam(':email', $email);             
             $result->bindParam(':foto', $foto);
 
             $result->execute();
             echo "<script> alert ('ACTUALIZACION EXITOSA')</script>";
             echo '<script> location.href="../view/Admin/verAliado.php"</script>';
 
        }
        public function modificarClave($newClave, $identificacion){
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

                $sql = "UPDATE usuarios SET Clave=:newClave WHERE identificacion=:identificacion";
                $result = $conexion->prepare ($sql);
                $result->bindParam(':newClave', $newClave);
                $result->bindParam(':identificacion', $identificacion);

                $result->execute();

                echo "<script> alert ('ACTUALIZACION DE CLAVE EXITOSA')</script>";
                echo '<script> location.href="../view/Admin/homeAdmin.php"</script>';

        }
        public function eliminarUser($id_user){
              // conectamos con la clase conexion
              $objetoConexion = new Conexion();
              $conexion = $objetoConexion->get_conexion();
              
              $sql ="DELETE FROM usuarios WHERE Identificacion=:id_user";
              $result =$conexion->prepare($sql);

              $result->bindParam(':id_user', $id_user);
              $result->execute();
              echo "<script> alert ('EL USUARIO HA SIDO ELIMINADO DE MANERA EXITOSA')</script>";
              echo '<script> location.href="../view/Admin/verUsers.php"</script>';

        }  
        public function TransferirPlanilla($cod_planilla, $fecha, $Descripcion, $Identificacion, $Cant_Puntos, $valorPesos){
            // conectamos con la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();
            
            $sql ="INSERT INTO transferencias (fecha, Descripcion, Identificacion, Cod_Planilla, Cant_Puntos, valorPesos) 
            VALUES (:fecha, :Descripcion, :Identificacion, :Cod_Planilla, :Cant_Puntos, :valorPesos)";
 
            $result =$conexion->prepare($sql);

            $result->bindParam(':fecha', $fecha);
            $result->bindParam(':Descripcion', $Descripcion);
            $result->bindParam(':Identificacion', $Identificacion);
            $result->bindParam(':Cod_Planilla', $cod_planilla);
            $result->bindParam(':Cant_Puntos', $Cant_Puntos);
            $result->bindParam(':valorPesos', $valorPesos);
            $result->execute();
            echo "<script> alert ('TRANSFERENCIA EXITOSA')</script>";
            echo '<script> location.href="../view/Admin/verPlanilla.php"</script>';

      }  

        public function mostrarPlanillasAdmin(){
            $f = null;
            // conectamos con la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT pp.Id_usuario, pp.Cant_Puntos, pp.valorPesos, pp.Cod_Planilla, pp.Descripcion, pp.Fecha, u.Nombres 
            FROM planilla_puntos AS pp
            INNER JOIN usuarios as u ON pp.id_aliado = u.Identificacion WHERE pp.Transferida='En Espera'";
            $result = $conexion -> prepare ($sql);
            $result -> execute();

            while ($consulta = $result -> fetch()){
                $f[] = $consulta;

            }
                return $f;

        }

        public function mostrarPlanillaAdmin($cod_planilla){
            $f = null;
            // conectamos con la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT * FROM  planilla_puntos  WHERE Cod_Planilla=:cod_planilla";
            $result = $conexion -> prepare ($sql);
            $result->bindParam(':cod_planilla', $cod_planilla);
            $result -> execute();

            while ($consulta = $result -> fetch()){
                $f[] = $consulta;

            }
                return $f;

        }
        public function modificarPlanilla($codplanilla, $cantpuntos, $descripcion, $fecha, $identificacion ){
            // conectamos con la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql ="UPDATE planilla_puntos SET Cod_Planilla=:codplanilla, Cant_Puntos=:cantpuntos, Descripcion=:descripcion, Fecha=:fecha, Identificacion=:identificacion";
            $result = $conexion->prepare($sql);
            $result->bindParam(':codplanilla', $codplanilla);
            $result->bindParam(':cantpuntos', $cantpuntos);
            $result->bindParam(':descripcion', $descripcion);
            $result->bindParam(':fecha', $fecha);
            $result->bindParam(':identificacion', $identificacion);
       
            $result->execute();
            echo "<script> alert ('ACTUALIZACION EXITOSA')</script>";
            echo '<script> location.href="../view/Admin/verplanilla.php"</script>';

       }

       public function mostrarTransferencia(){
        $f = null;
        // conectamos con la clase conexion
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();

        $sql = "SELECT * FROM  transferencias";
        $result = $conexion -> prepare ($sql);
        $result -> execute();

        while ($consulta = $result -> fetch()){
            $f[] = $consulta;

        }
            return $f;

    }

    public function TransferidaAdmin($transferencia, $cod_planilla){
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();
    
            $sql = "UPDATE planilla_puntos SET Transferida=:transferencia WHERE Cod_Planilla=:cod_planilla";
            $result = $conexion->prepare ($sql);
            $result->bindParam(':transferencia', $transferencia);
            $result->bindParam(':cod_planilla', $cod_planilla);
    
            $result->execute();
    
    
    }

    public function totalUsuarios(){

        $f = null;
        //Conectamos con la clase Conexion 
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();

        $sql = "SELECT COUNT(Identificacion) AS NumberOfUser FROM usuarios WHERE Rol='Usuario'";
        $result = $conexion->prepare($sql);
        $result->execute();

        while ($consulta = $result->fetch()) {
            $f[] = $consulta;
        }
        return $f;
    }

    public function totalAliados(){

        $f = null;
        //Conectamos con la clase Conexion 
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();

        $sql = "SELECT COUNT(Identificacion) AS NumberOfUser FROM usuarios WHERE Rol='Aliado'";
        $result = $conexion->prepare($sql);
        $result->execute();

        while ($consulta = $result->fetch()) {
            $f[] = $consulta;
        }
        return $f;
    }

    public function TotalPlanillas(){

        $f = null;
        //Conectamos con la clase Conexion 
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();

        $sql = "SELECT COUNT(Cod_Transferencia) AS NumberTransferencias FROM Transferencias ";
        $result = $conexion->prepare($sql);
        $result->execute();

        while ($consulta = $result->fetch()) {
            $f[] = $consulta;
        }
        return $f;
    }


    }




    


?>

