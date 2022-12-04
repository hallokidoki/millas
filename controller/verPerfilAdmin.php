<?php   

    function mostrarPerfil(){
        $Email=$_SESSION['Email'];
        $objetoconsultas= new ConsultasAdmin();
        $result = $objetoconsultas->verPerfil($Email);

        foreach($result as $f){
            
            echo '
             <!-- Brand Logo -->
             <a href="homeAdmin.php" class="brand-link">
             <img src="../dashboard-base/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
           <span class="brand-text font-weight-light">'.$f["Rol"].'</span>
            </a>
            <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                <img src="../'.$f["foto"].'" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                <a href="editarPerfil.php?id_user='.$f["Identificacion"].'" class="d-block"> '.$f["Nombres"].' '.$f ["Apellidos"].' <i class="fa fa-user-edit"></i></a>
                <a href="../../controller/cerrarSesion.php" class="d-block ">
                <p>Cerrar Sesión </p>
              </a>
                </div>
            </div>        

            ';
        }

        function Totalusuarios(){
            $objetoConsulta = new ConsultasAdmin();
            $result = $objetoConsulta->totalUsuarios();
          
            foreach($result as $f){
            echo '
            <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-warning">
                        <div class="inner">
                          <h3>'.$f["NumberOfUser"].'</h3> 
          
                          <p>Usuarios Registrados</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                      </div>
                    </div>
                    ';
           }
          }

          function TotalAliados(){
            $objetoConsulta = new ConsultasAdmin();
            $result = $objetoConsulta->totalAliados();
          
            foreach($result as $f){
            echo '
            <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-success">
                        <div class="inner">
                          <h3>'.$f["NumberOfUser"].'</h3> 
          
                          <p>Aliados Registrados</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                      </div>
                    </div>
                    ';
           }
          }

          
          function TotalPlanillas(){
            $objetoConsulta = new ConsultasAdmin();
            $result = $objetoConsulta->TotalPlanillas();
          
            foreach($result as $f){
            echo '
            <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-primary">
                        <div class="inner">
                          <h3>'.$f["NumberTransferencias"].'</h3> 
          
                          <p>Transferencias Realizadas</p>
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