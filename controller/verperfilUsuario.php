<?php   

    function mostrarPerfilUser(){
        $id_user=$_SESSION['Id'];
        $Email=$_SESSION['Email'];
        $objetoconsultas= new consultasUsuario();
        $result = $objetoconsultas->verperfilUsuario($Email);
        $puntos= $objetoconsultas->verPuntosUsuario($id_user);
        
        
       if(!$puntos){
        echo '<!-- Brand Logo -->
        <a href="homeUsuario.php" class="brand-link">
        <img src="../dashboard-base/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"> NO TIENES PUNTOS </span>
       </a>';  
       }else{
        echo '<a href="mispuntos.php" class="brand-link">
        <img src="../dashboard-base/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">';
        foreach($puntos as $p){
            
            echo '<span class="brand-text ">Puntos : '.$p["ptotal"].' </span>';  
        }
        echo '</a>';
        
       }
        foreach($result as $f){
            
            echo '
             
            <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                <img src="../'.$f["foto"].'" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                <a href="editarUsuario.php?id_user='.$f["Identificacion"].'" class="d-block"> '.$f["Nombres"].' '.$f ["Apellidos"].' <i class="fa fa-user-edit"></i> </a>
                <a href="../../controller/cerrarSesion.php" class="d-block ">
                <p>Cerrar Sesión </p>
              </a>
                </div>
            </div>        

            ';
        }

    }

    function mostrarPuntos(){
        $id_user=$_SESSION['Id'];
       // $Email=$_SESSION['Email'];
        $objetoconsultas= new consultasUsuario();
        //$result = $objetoconsultas->verperfilUsuario($Email);
        $puntos= $objetoconsultas->verPuntosUsuario($id_user);
         foreach($puntos as $p){            

        echo'

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Mis Puntos:'.$p["ptotal"].'</h3>
                <h3>Mi ahorro: $'.$p["vtotal"].'</h3>
              
                <p>Total Puntos</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          ';
        }
    }
?>