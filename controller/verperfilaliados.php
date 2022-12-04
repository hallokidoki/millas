<?php   

    function mostrarPerfil(){
        $Email=$_SESSION['Email'];
        $objetoconsultas= new consultasAliados();
        $result = $objetoconsultas->verPerfil($Email);
        
        foreach($result as $f){
            
            echo '
             <!-- Brand Logo -->
             <a href="homeAliados.php" class="brand-link">
             <img src="../dashboard-base/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
           <span class="brand-text font-weight-light">'.$f["Rol"].'</span>
            </a>
            <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                <img src="../'.$f["foto"].'" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                <a href="editarAliado.php?id_user='.$f["Identificacion"].'" class="d-block"> '.$f["Nombres"].'<i class="fa fa-user-edit"></i>  </a>
                <a href="../../controller/cerrarSesion.php" class="d-block ">
                <p>Cerrar Sesión </p>
              </a>
                </div>
            </div>        

            ';
        }

        function totalPlanillas(){
            $objetoConsulta = new ConsultasAliados();
            $result = $objetoConsulta->totalPlanillas();
          
            foreach($result as $f){
            echo '
            <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-warning">
                        <div class="inner">
                          <h3>'.$f["NumberPlanillas"].'</h3> 
          
                          <p>Planillas Registradas</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                      </div>
                    </div>
                    ';
           }
          }


    }

?>