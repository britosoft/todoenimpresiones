
 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="inicio" class="brand-link">
      <img src="vistas/imagenes/logo/logo.jpeg" alt="Todo en impresiones" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Todo en impresiones</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     <!-- Sidebar user (optional) -->

      <?php 
   if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){


if( $_SESSION["foto"] != ""){

      echo'
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="'.$_SESSION["foto"].'" class="img-circle elevation-2" alt="User Image">
        </div>';
     
        }else{

        echo'  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="vistas/imagenes/usuarios/avatar/user.png" class="img-circle elevation-2" alt="User Image">
        </div>';

        }
         echo'
        <div class="info">
          <a href="inicio" class="d-block">'.$_SESSION["nombre"].'<br>

            <div style="background: green; border-radius: 50%; height: 10px; width: 10px; margin-right: 3px">
              <p class="ml-3" style="top:  -5px; position: relative; font-size: 12px">En linea</p>
            </div>
          </a>
        </div>';

      }else{


        echo'  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         
        </div>';

      

      }
          ?>

       


          <div>
        </div>
      </div>
    </div>


    <!-- Sidebar -->
    <div class="sidebar sidebar-menu">
  

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <li class="active">
                <a href="inicio" class="nav-link">
                  <i class="fa fa-home"></i>
                  <p>Inicio</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="usuarios" class="nav-link">
                  <i class="fa fa-user"></i>
                  <p>Usuarios</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="categorias" class="nav-link">
                  <i class="fas fa-th"></i>
                  <p>Categorias</p>
                </a>
              </li>


               <li class="nav-item">
                <a href="productos" class="nav-link">
                  <i class="fab fa-product-hunt"></i>
                  <p>Productos</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="clientes" class="nav-link">
                  <i class="fa fa-users "></i>
                  <p>Clientes</p>
                </a>
              </li>

               <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-product-hunt"></i>
              <p>
               Pedidos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pedidos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Administrar pedidos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="crear-pedidos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear pedidos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="reportes" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte de pedidos</p>
                </a>
              </li>
            </ul>
          </li>
         
            </ul>
        
         
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
