<?php

  

    function cargarAliado(){
    
    if(isset($_GET['id_user'])){
       $objetoConsulta = new consultasAliados();
       $id_user= $_GET['id_user'];
       $result = $objetoConsulta->mostrarAliadoA($id_user);

       foreach ($result as $f){
            echo'
            <form action="../../controller/mAliado.php"  method="POST" enctype="multipart/form-data">
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