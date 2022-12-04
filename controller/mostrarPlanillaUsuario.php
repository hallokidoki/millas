<?php

    function cargarPlanillasUsuario (){
        $id=$_SESSION['Id'];
        $objetoConsultas=new consultasUsuario();
        $result=$objetoConsultas->mostrarPlanillasUsuario($id);

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
                    <th>Identificación</th>
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

    


?>