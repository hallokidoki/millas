<?php
class consultasAliados{
    public function regplanilla($Cantidad_puntos, $Id_usuario, $id_aliado,$descripcion,$fechaActual, $valorPesos, $transferencia){
                 // conectamos con la clase conexion
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();

        $sql = "INSERT INTO planilla_puntos (Cant_Puntos, Descripcion, Fecha, Id_usuario, id_aliado, valorPesos, Transferida) 
        VALUES (:Cantidad_puntos,:Descripcion,:FechaActual, :Id_usuario, :id_aliado, :valorPesos, :Transferida)";

            $result = $conexion->prepare($sql);
            $result->bindParam(':Cantidad_puntos', $Cantidad_puntos);
            $result->bindParam(':Descripcion', $descripcion);
            $result->bindParam(':FechaActual',  $fechaActual);
            $result->bindParam(':Id_usuario', $Id_usuario);
            $result->bindParam(':id_aliado', $id_aliado);
            $result->bindParam(':valorPesos', $valorPesos);
            $result->bindParam(':Transferida', $transferencia);

        $result->execute();
        echo '<script> alert ("REGISTRO EXITOSO")</script>';
        echo '<script> location.href="../view/Aliados/registrarPlanillaForm.php?user_id='.$Id_usuario.'"</script>';

        
    }
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
    
    public function mostrarPlanillasAliado($id_aliado){
        $f = null;
        // conectamos con la clase conexion
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();

        $sql = "SELECT * FROM  planilla_puntos  where id_aliado=:id_aliado AND Transferida='No'";
        $result = $conexion -> prepare ($sql);
        $result->bindParam(':id_aliado', $id_aliado);
        $result -> execute();

        while ($consulta = $result -> fetch()){
            $f[] = $consulta;

        }
            return $f;

    }

    public function mostrarPlanillaAliado($cod_planilla){
        $f = null;
        // conectamos con la clase conexion
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();

        $sql = "SELECT * FROM  planilla_puntos  WHERE cod_planilla=:cod_planilla";
        $result = $conexion->prepare($sql);
        $result->bindParam(':cod_planilla', $cod_planilla);
        $result -> execute();
        while ($consulta = $result -> fetch()){
            $f[] = $consulta;

        }
            return $f;

    }
    public function modificarPlanilla($codplanilla, $cantpuntos, $descripcion ){
        // conectamos con la clase conexion
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();

        $sql ="UPDATE planilla_puntos SET Cant_Puntos=:cantpuntos, Descripcion=:descripcion  WHERE Cod_Planilla=:codplanilla" ;
        $result = $conexion->prepare($sql);
        $result->bindParam(':codplanilla', $codplanilla);
        $result->bindParam(':cantpuntos', $cantpuntos);
        $result->bindParam(':descripcion', $descripcion);
       
        
        
        $result->execute();
       
        echo "<script> alert ('ACTUALIZACION EXITOSA')</script>";
        echo '<script> location.href="../view/Aliados/verPlanillaAliado.php"</script>';

   }
   public function eliminarPlanilla($cod_planilla){
    // conectamos con la clase conexion
    $objetoConexion = new Conexion();
    $conexion = $objetoConexion->get_conexion();
    
    $sql ="DELETE FROM planilla_puntos WHERE Cod_Planilla=:cod_planilla";
    $result =$conexion->prepare($sql);

    $result->bindParam(':cod_planilla', $cod_planilla);
    $result->execute();
    echo "<script> alert ('LA PLANILLA HA SIDO ELIMINADA DE MANERA EXITOSA')</script>";
    echo '<script> location.href="../view/Aliados/verPlanillaAliado.php"</script>';

} 

   public function mostrarAliadoA($id_user){
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
    echo '<script> location.href="../view/Aliados/homeAliados.php"</script>';

}
public function modificarClaveA($newClave, $identificacion){
    $objetoConexion = new Conexion();
    $conexion = $objetoConexion->get_conexion();

        $sql = "UPDATE usuarios SET Clave=:newClave WHERE identificacion=:identificacion";
        $result = $conexion->prepare ($sql);
        $result->bindParam(':newClave', $newClave);
        $result->bindParam(':identificacion', $identificacion);

        $result->execute();

        echo "<script> alert ('ACTUALIZACION DE CLAVE EXITOSA')</script>";
        echo '<script> location.href="../view/Aliados/homeAliados.php"</script>';

}
    public function mostrarUsuarios(){
    $f = null;
    // conectamos con la clase conexion
    $objetoConexion = new Conexion();
    $conexion = $objetoConexion->get_conexion();

    $sql = "SELECT * FROM  usuarios  WHERE Rol='Usuario'";
    $result = $conexion -> prepare ($sql);
    $result -> execute();

    while ($consulta = $result -> fetch()){
        $f[] = $consulta;

    }
        return $f;

}

public function mostrarUsuario($user_id){
    $f = null;
    // conectamos con la clase conexion
    $objetoConexion = new Conexion();
    $conexion = $objetoConexion->get_conexion();

    $sql = "SELECT * FROM  usuarios  WHERE Identificacion=:id_user";
    $result = $conexion -> prepare ($sql);
    $result->bindParam(':id_user', $user_id);
    $result -> execute();
    while ($consulta = $result -> fetch()){
        $f[] = $consulta;

    }
        return $f;

}

public function TransferidaAliado($transferencia, $cod_planilla){
    $objetoConexion = new Conexion();
    $conexion = $objetoConexion->get_conexion();

        $sql = "UPDATE planilla_puntos SET Transferida=:transferencia WHERE Cod_Planilla=:cod_planilla";
        $result = $conexion->prepare ($sql);
        $result->bindParam(':transferencia', $transferencia);
        $result->bindParam(':cod_planilla', $cod_planilla);

        $result->execute();

        echo "<script> alert ('TRANSFERENCIA EXITOSA')</script>";
        echo '<script> location.href="../view/Aliados/verPlanillaAliado.php"</script>';
}

public function mostrarTransferenciaAliado($id_aliado){
    $f = null;
    // conectamos con la clase conexion
    $objetoConexion = new Conexion();
    $conexion = $objetoConexion->get_conexion();

    $sql = "SELECT * FROM Planilla_Puntos WHERE (id_aliado=:idaliado ) and (Transferida = 'En Espera' OR Transferida='Si')";
    $result = $conexion -> prepare ($sql);
    $result->bindParam(':idaliado', $id_aliado);
    $result -> execute();

    while ($consulta = $result -> fetch()){
        $f[] = $consulta;

    }
        return $f;

}

public function totalPlanillas(){

    $f = null;
    //Conectamos con la clase Conexion 
    $objetoConexion = new Conexion();
    $conexion = $objetoConexion->get_conexion();

    $sql = "SELECT COUNT(Cod_Planilla) AS NumberPlanillas FROM planilla_puntos";
    $result = $conexion->prepare($sql);
    $result->execute();

    while ($consulta = $result->fetch()) {
        $f[] = $consulta;
    }
    return $f;
}

}

?>
