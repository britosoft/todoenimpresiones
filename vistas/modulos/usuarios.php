
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar Usuarios</h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="innicio">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar usuarios</li>
            </ol>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">

        <div class="card-header">
             <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          
          Agregar usuario

        </button>

      </div>

      
        </div>

      
       <div class="card-body">
          

       <table class="table  table table-striped table-bordered dt-responsive nowrap tablas" style="width: 100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Usuario</th>
           <th>Foto</th>
           <th>Rol</th>
           <th>Sucursal</th>
           <th>Estado</th>
           <th>Último login</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

       foreach ($usuarios as $key => $value){
         
          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["usuario"].'</td>';

                  if($value["foto"] != ""){

                    echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                  }else{

                    echo '<td><img src="vistas/imagenes/usuarios/avatar/user.png" class="img-thumbnail" width="40px"></td>';

                  }

                  echo '<td>'.$value["rol"].'</td>
                  <td>'.$value["sucursal"].'</td>';

                  if($value["estado"] != 0){

                    echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                  }else{

                    echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                  }             

                  echo '<td>'.$value["ultimo_login"].'</td>
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>

                    </div>  

                  </td>

                </tr>';
        }


        ?> 

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>
        <!-- /.card-body -->
    
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">
        <?php
         if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){  

         echo'<input type="hidden" value="'.$_SESSION["id"].'" id="idUsuario"  name="idUsuario">
         <input type="hidden" value="'.$_SESSION["foto"].'" name="fotoUsuario" id="fotoUsuario">';       
        }
   
?>

        <!--=====================================
        MODAL AGREGAR USUARIOS
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button mr-2" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL Agregar usuario
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user mr-2"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key mr-2"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock mr-2"></i></span> 

                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU SUCURSAL!--->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-home mr-2"></i></span> 

                <select class="form-control input-lg" name="nuevaSucursal">
                  
                  <option value="">Selecionar La Sucursal</option>

                  <option value="Parque Lefébere">Parque Lefébere</option>

                  <option value="San miguelito">San miguelito</option>

                  <option value="Paitilla">Paitilla</option>

                </select>

              </div>

            </div>


            <!-- ENTRADA PARA SELECCIONAR SU ROL-->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon">  <i class="fa fa-users mr-2"></i></span> 

                <select class="form-control input-lg" name="nuevoRol">
                  
                  <option value="">Selecionar Rol</option>

                  <option value="Administrador">Administrador</option>

                  <option value="Diseñador">Diseñador</option>

                  <option value="Vendedor">Vendedor</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" id="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 200 MB</p>

              <img src="" class="img-thumbnail" width="100px" id="previsualizarImagen">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar usuario</button>

        </div>

           <?php

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();

        ?>

      </form>

    </div>

  </div>

</div>




<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title ml-2">Actualizar  Usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon mr-2"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon mr-2"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon mr-2"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">
            <?php 
            if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){  
            echo'

                <input type="hidden" id="passwordActual" name="passwordActual" value="'.$_SESSION["rol"].'">';
}
                   ?> 
              </div>

            </div>

             <!-- ENTRADA PARA SELECCIONAR SU SUCURSAL!--->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon mr-2"><i class="fa fa-home"></i></span>
                <?php
                if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){   echo'
                <select class="form-control input-lg" name="editarSucursal">
                  
                  <option value="'.$_SESSION["sucursal"].'" id="editarSucursal"> '.$_SESSION["rol"].'</option>';
                }

                   ?> 


                  <option value="Parque Lefébere">Parque Lefébere</option>

                  <option value="San miguelito">San miguelito</option>

                  <option value="Paitilla">Paitilla</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU ROL -->

            <div class="form-group">
              
              <div class="input-group">
        
                <span class="input-group-addon mr-2"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarRol">
                  <?php  
                  
                 echo' <option value="'.$_SESSION["rol"].'" id="editarRol">'.$_SESSION["rol"].'</option>';

                  ?>

                  <option value="Administrador">Administrador</option>

                  <option value="diseñador">Diseñador</option>

                  <option value="Vendedor">Vendedor</option>

                </select>

              </div>

            </div>




            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="editarFoto" id="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/imagenes/usuarios/user.png" class="img-thumbnail previsualizarEditar" width="100px" id="previsualizarEditar">

              <input type="hidden" name="fotoActual" id="fotoActual" value="">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Acualizar  Usuario</button>

        </div>

     <?php

          $editarUsuario = new ControladorUsuarios();
          $editarUsuario -> ctrEditarUsuario();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?> 


