<?php

    function cargarAliados (){
        $objetoConsultas = new ConsultasAdmin();
        $result = $objetoConsultas -> mostrarAliados();

        if (!isset($result)){
            echo '<h2>NO EXISTEN USUARIOS </h2>';

        }else{

                echo'
                    <table id="tableusuarios" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                    <th>Tipo de documento</th>
                    <th>Nit</th>
                    <th>Razon Social</th>
                    <th>Direccion</th>
                    <th>Ciudad</th>
                    <th>Telefono</th>
                    <th>Email</th>                    
                    <th>Valor por Punto</th>
                    <th>Ver/Editar</th>
                    <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                '; 
                foreach($result as $f ){
                    echo'
                        <tr class="'.$f['Estado'].'">
                            <td>'.$f["Tipo_Documento"].'</td>
                            <td>'.$f["Identificacion"].'</td>
                            <td>'.$f["Nombres"].'</td>
                            <td>'.$f["Direccion"].'</td>
                            <td>'.$f["Ciudad"].'</td>
                            <td>'.$f["Telefono"].'</td>
                            <td>'.$f["Email"].'</td>
                            <td>'.$f["valorPunto"].'</td>                          
                            <td><a href="editarAliado.php?id_user='.$f["Identificacion"].'" class="btn btn-primary">Ver/Editar</a></td>
                            <td><a href="../../controller/eAliadoAdmin.php?id_user='.$f["Identificacion"].'" class="btn btn-danger">Eliminar</a></td>
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

    function cargarAliado(){
    
    if(isset($_GET['id_user'])){
       $objetoConsulta = new ConsultasAdmin();
       $id_user= $_GET['id_user'];
       $result = $objetoConsulta->mostrarAliado($id_user);

       foreach ($result as $f){
            echo'
            <form action="../../controller/mAliadoAdmin.php"  method="POST" enctype="multipart/form-data">
            <div class="card-body">
            <div class="row">
            <div class="form-group col-md-6">
                      <label for="Tipo_Documento">Tipo de Documento</label>
                          <select id= "Tipo_Documento" name="Tipo_Documento"class="form-control" required>
                                <option>Seleccione...</option>
                                <option value="NIT">NIT</option>
                                
                          </select>
            </div>
            <div class="form-group col-md-6">
                <label for="identificacion">Nit</label>
                <input type="number" class="form-control" id="identificacion" name="identificacion" value="'.$f["Identificacion"].'" required>
            </div>
            <div class="form-group col-md-6">
                    <label for="nombres">Razón Social</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" value="'.$f["Nombres"].'" required>
            </div>                        
            <div class="form-group col-md-6">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="'.$f["Direccion"].'" required>
            </div>
            <div class="form-group col-md-6">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" value="'.$f["Ciudad"].'" required>
            </div>
            <div class="form-group col-md-6">
                    <label for="telefono">Teléfono</label>
                    <input type="number" class="form-control" id="telefono" name="telefono" value="'.$f["Telefono"].'" required>
            </div>
            <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="Email" class="form-control" id="email" name="email" value="'.$f["Email"].'" required>
            </div>
            <div class="form-group col-md-6">
                    <label for="email">Valor por Punto</label>
                    <input type="number" class="form-control" id="valorpunto" name="valorpunto" value="'.$f["valorPunto"].'" required>
            </div>                        
            
           
            <div class="form-group col-md-6">
                    <label for="foto">Foto perfil</label>
                    <input type="file" accept=".png, .jpg, .jpeg, .gif" class="form-control" id="foto" name="foto" placeholder="">
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