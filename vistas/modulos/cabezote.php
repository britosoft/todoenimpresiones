<?php 

  if(isset($_SESSION["iniciarSesion"])){

    if($_SESSION["iniciarSesion"] == "ok"){
      echo '<script>
     localStorage.setItem("usuario","'.$_SESSION["id"].'" );

      </script>';
    }
  }


       $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();
    //var_dump($_SESSION["iniciarSesion"]);

 ?>


<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>



    <!-- perfil de usuario -->

		<div class="navbar-custom-menu" style=" position: absolute; right: 2%">
				
			<ul class="nav navbar-nav">
				
				<li class="user user-menu">
					
         <?php 
         if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){
           

          if( $_SESSION["foto"] != ""){


					echo'<img src="'.$_SESSION["foto"].'" class="user-image">
						
						<span class="hidden-xs text-white" >'.$_SESSION["rol"].'<a href="salir"><i class="fas fa-power-off text-danger pl-2"></i></a></span>';

                }else{

               echo'<img src="vistas/imagenes/usuarios/avatar/user.png" class="user-image">
               <span class="hidden-xs text-white" >'.$_SESSION["rol"].'<a href="salir"><i class="fas fa-power-off text-danger pl-2"></i></a></span>';
 

                    }
                  }else{
                    echo'  <button class="btn btn-primary" data-toggle="modal" data-target="#modalIngresar">
                    Ingresar

                   </button>';
                  }

						?>


					

				</li>

			</ul>

		</div>

  </nav>




  <!---============ =========================
     MODAL INGRESO USUARIO
  ======================================-->

  <div class="container">

  <!-- The Modal -->
  <div class="modal" id="modalIngresar">
    <div class=" modal-content modal-dialog animate__animated  animate__zoomInDown ">
      <div class="">
      
      <div class="login-logo">
   <img src="vistas/imagenes/logo/logo.jpeg" class="img-responsive" style=" width: 20%">
  </div>
        
        <!-- Modal bodyonsubmit="return registroUsuario()" onsubmit="return registroUsuario()" -->
        <div class="modal-body ">
           <div class="card">
    <div class="card-body register-card-body">
      <h2 class="login-box-msg text-center">Ingresar</h2>

      <form   method="post" >
        
        <div class="input-group mb-3">

          <input type="text"  id="ingUsuario" name="ingUsuario" class="form-control" placeholder="Usuario" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
               
    <input type="password"  class="form-control" name="ingPassword" id="ingPassword" placeholder="Contraseña">

  

  

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="row">

          
          <!-- /.col -->

          <div class="col-4">
        <?php

        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();

       ?>
     <button type="submit" class="btn  btn-block btnIngreso " style="background-color: #00ff;
  color: #fff; ">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
   
         
      </form>

      <div class="social-auth-links text-center">
        <p>- O -</p>
      
     

        </div>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
        </div>
        <br>

     
        
      </div>
    </div>
  </div>
  