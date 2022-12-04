<?php
class consultasUsuario{
   
    public function verperfilUsuario($Email){
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
    public function verPuntosUsuario($id_user){
        $f=null;
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();
        //consulta se suma 
        $sql = "SELECT SUM(Cant_Puntos) as ptotal, SUM(valorPesos)as vtotal FROM planilla_puntos where Id_usuario=:id_user ";
        $result = $conexion->prepare ($sql);
        $result->bindParam(':id_user', $id_user);
        $result->execute();
        while ($resultado=$result->fetch()){
            $f[] = $resultado;
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

public function mostrarPlanillasUsuario($id){
    $f = null;
    // conectamos con la clase conexion
    $objetoConexion = new Conexion();
    $conexion = $objetoConexion->get_conexion();

    $sql = "SELECT pp.Id_usuario, pp.Cant_Puntos, pp.valorPesos, pp.Cod_Planilla, pp.Descripcion, pp.Fecha, u.Nombres 
    FROM planilla_puntos AS pp
    INNER JOIN usuarios as u ON pp.id_aliado = u.Identificacion WHERE pp.Id_usuario=:Identificacion";
    $result = $conexion -> prepare ($sql);
    $result->bindParam(':Identificacion', $id);
    $result -> execute();

    while ($consulta = $result -> fetch()){
        $f[] = $consulta;

    }
        return $f;

}

public function modificarUser($tipodocumento, $identificacion, $nombres, $apellidos, $fecha_nacimiento, $direccion, $ciudad, $telefono, $email, $foto){
    // conectamos con la clase conexion
    $objetoConexion = new Conexion();
    $conexion = $objetoConexion->get_conexion();

    $sql ="UPDATE usuarios SET Tipo_Documento=:tipodocumento, Nombres=:nombres, Apellidos=:apellidos, Fecha_Nacimiento=:fecha_nacimiento, Direccion=:direccion, Ciudad=:ciudad, Telefono=:telefono, Email=:email, foto=:foto WHERE Identificacion=:identificacion";
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
    $result->bindParam(':foto', $foto);
            
   
    $result->execute();
    echo "<script> alert ('ACTUALIZACION EXITOSA')</script>";
    echo '<script> location.href="../view/Usuario/homeUsuario.php"</script>';

}
public function modificarClaveU($newClave, $identificacion){
    $objetoConexion = new Conexion();
    $conexion = $objetoConexion->get_conexion();

        $sql = "UPDATE usuarios SET Clave=:newClave WHERE identificacion=:identificacion";
        $result = $conexion->prepare ($sql);
        $result->bindParam(':newClave', $newClave);
        $result->bindParam(':identificacion', $identificacion);

        $result->execute();

        echo "<script> alert ('ACTUALIZACION DE CLAVE EXITOSA')</script>";
        echo '<script> location.href="../view/Usuario/homeUsuario.php"</script>';

}


}

?>