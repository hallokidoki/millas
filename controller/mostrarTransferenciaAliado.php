<?php

    function cargarTransferenciasAliados(){
        $objetoConsultas = new ConsultasAliados();
        $id_aliado=$_SESSION['Id'];
        $result = $objetoConsultas -> mostrarTransferenciaAliado($id_aliado);
        

        if (!isset($result)){
            echo '<h2>NO EXISTEN TRANSFERENCIAS</h2>';

        }else{

                echo'
                    <table id="tableTransferencias" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                    <th>Codigo Planilla</th>
                    <th>Cantidad Puntos</th>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>Identificacion</th>
                    <th>Valor Puntos</th>                   
                    </thead>
                    <tbody>
                '; 
                foreach($result as $f ){
                    echo'
                        <tr>
                            <td>'.$f["Cod_Planilla"].'</td>
                            <td>'.$f["Cant_Puntos"].'</td>
                            <td>'.$f["Descripcion"].'</td>
                            <td>'.$f["Fecha"].'</td>
                            <td>'.$f["Id_usuario"].'</td>
                            <td>'.$f["valorPesos"].'</td>
                        </tr>
                    ';
                }

                echo '
                    </tbody>
                    <tfoot>                  
                    </tfoot>
                    </table>
                
                ';





        }
    }

    function cargarTransferencia(){
    
    if(isset($_GET['id_user'])){
       $objetoConsulta = new consultasAdmin();
       $id_user= $_GET['id_user'];
       $result = $objetoConsulta->mostrarUser($id_user);

       foreach ($result as $f){
            echo'
            <form action="../../controller/mUserAdmin.php"  method="POST" enctype="multipart/form-data">
            <div class="card-body">
                 <div class="row">

                      <div class="form-group col-md-6">
                          <label for="Tipo_Documento">Tipo de Documento</label>
                              <select id= "Tipo_Documento" name="Tipo_Documento"class="form-control" required>
                                    <option value="'.$f["Tipo_Documento"].'">'.$f["Tipo_Documento"].'...</option>
                                    <option value="C.C">C.C</option>
                                    <option value="C.E">C.E</option>
                                    <option value="Pasaporte">Pasaporte</option>
                                    <option value="Otro">Otro</option>
                                  </select>
                       </div>
                      <div class="form-group col-md-6">
                        <label for="identificacion">Numero de Documento</label>
                        <input type="number" class="form-control" readonly="readonly" value="'.$f["Identificacion"].'" id="identificacion" name="identificacion" placeholder="Ej:123456" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="nombres">Nombres</label>
                        <input type="text" class="form-control" value="'.$f["Nombres"].'" id="nombres" name="nombres" placeholder="Ej:Ana Maria" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" value="'.$f["Apellidos"].'" id="apellidos" name="apellidos" placeholder="Ej:Perez" required>
                      </div>
                      <div class="form-group col-md-6">
                      <label for="fecha_nacimiento">Fecha_Nacimiento</label>
                      <input type="date" class="form-control" value="'.$f["Fecha_Nacimiento"].'" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="01/01/2000" required>
                    </div>
                      <div class="form-group col-md-6">
                      <label for="direccion">Direccion</label>
                      <input type="text" class="form-control" value="'.$f["Direccion"].'" id="direccion" name="direccion" placeholder="Ej:calle 13 a " required>
                    </div>
                      <div class="form-group col-md-6">
                      <label for="ciudad">Ciudad</label>
                      <input type="text" class="form-control" value="'.$f["Ciudad"].'" id="ciudad" name="ciudad" placeholder="Ej:bogota" required>
                    </div>
                      <div class="form-group col-md-6">
                      <label for="telefono">Telefono</label>
                      <input type="number" class="form-control" value="'.$f["Telefono"].'" id="telefono" name="telefono" placeholder="Ej:3132564" required>
                    </div>
                      <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="Email" class="form-control" value="'.$f["Email"].'" id="email" name="email" placeholder="Ej:ana@gmail.com" required>
                      </div>
                     
                     
                      <div class="form-group col-md-6">
                        <label for="rol">Rol</label>
                        <select id= "rol" name="rol" class="form-control"  required>
                                    <option value="'.$f["Rol"].'">'.$f["Rol"].'</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Usuario">Usuario</option>
                                    <option value="Aliados">Aliados</option>
                         </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="estado">Estado</label>
                        <select id= "estado" name="estado" class="form-control" required>
                                    <option value="'.$f["Estado"].'">'.$f["Estado"].'</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Inactivo">Inactivo</option>
                         </select>
                         <div class="form-group col-md-6">
                         <label for="foto">Foto perfil</label>
                         <input type="file" accept=".png, .jpg, .jpeg, .gif" class="form-control" id="foto" name="foto" placeholder="">
                       </div>
                      </div>
                    

                </div>
           </div>
             
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">MODIFICAR</button>
            </div>
          </form>
            
            ';

       }
    }
}






?>