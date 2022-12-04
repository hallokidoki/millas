<?php

    function cargarPlanillasAdmin (){
        $objetoConsultas = new ConsultasAdmin();
        $result = $objetoConsultas -> mostrarPlanillasAdmin();

        if (!isset($result)){
            echo '<h2>NO HAY PLANILLAS REGISTRADAS </h2>';

        }else{

                echo'
                    <table id="tableplanilla_puntos" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                    <th>Entidad</th>
                    <th>Codigo Planilla</th>
                    <th>Cantidad Puntos</th>
                    <th>Valor Puntos</th>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>Identificacion</th>
                    <th>Transferir</th>
                    </tr>
                    </thead>
                    <tbody>
                '; 
                foreach($result as $f ){
                    echo'
                        <tr>
                        <td>'.$f["Nombres"].'</td>
                        <td>'.$f["Cod_Planilla"].'</td>
                        <td>'.$f["Cant_Puntos"].'</td>
                        <td>'.$f["valorPesos"].'</td>
                        <td>'.$f["Descripcion"].'</td>
                        <td>'.$f["Fecha"].'</td>
                        <td>'.$f["Id_usuario"].'</td>
                        <td><a href="../../controller/TransferirPlanilla.php?cod_planilla='.$f["Cod_Planilla"].'&Descripcion='.$f["Descripcion"].'&Identificacion='.$f["Id_usuario"].'&Cant_Puntos='.$f["Cant_Puntos"].' &valorPesos='.$f["valorPesos"].' "  class="btn btn-success">Transferir</a></td>
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

    function modificarPlanillaAdmin(){
    
    if(isset($_GET['cod_planilla'])){
       $objetoConsulta = new ConsultasAdmin();
       $cod_planilla= $_GET['cod_planilla'];
       $result = $objetoConsulta->mostrarPlanillaAdmin($cod_planilla);

       foreach ($result as $f){
            echo'
            <form action="../../controller/mPlanillaAdmin.php" method="POST">
            <div class="card-body">
                 <div class="row">
                        <div class="form-group col-md-6">
                        <label for="Cod_Planilla">Codigo planilla</label>
                        <input type="number" class="form-control" readonly="readonly" value="'.$f["Cod_Planilla"].'" id="Cod_Planilla" name="Cod_Planilla" placeholder="Ej:123456" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="Cant_Puntos">Cantidad Puntos</label>
                        <input type="number" class="form-control" value="'.$f["Cant_Puntos"].'" id="Cant_Puntos" name="Cant_Puntos" placeholder="Ej:30" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="Descripcion">Descripcion</label>
                        <input type="text" class="form-control" value="'.$f["Descripcion"].'" id="Descripcion" name="Descripcion" placeholder="la planilla ......" required>
                      </div>
                      <div class="form-group col-md-6">
                      <label for="Fecha">Fecha</label>
                      <input type="date" class="form-control" value="'.$f["Fecha"].'" id="Fecha" name="Fecha" placeholder="01/01/2000" required>
                    </div>
                      <div class="form-group col-md-6">
                      <label for="Id_usuario">Identificacion</label>
                      <input type="number" class="form-control" value="'.$f["Id_usuario"].'" id="Id_usuario" name="Identificacion" placeholder="12345 " required>
                                 

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