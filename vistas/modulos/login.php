<div class="login-page">
<div class="login-box">
  <div class="login-logo">
   <img src="vistas/imagenes/logo/logo.jpeg" class="img-responsive" style=" width: 35%">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingresar al sistema</p>

      <form  method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="ingUsuario"  placeholder="Usuario"autocomplete="off" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="ingPassword" placeholder="Contraseña" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn  btn-block" style="background:#33ccff; color: #fff">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
          <?php

        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();
        
      ?>
      </form>

     


    </div>
    <!-- /.login-card-body -->
  </div>
</div>

</div>

