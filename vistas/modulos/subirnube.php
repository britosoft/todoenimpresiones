
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Todo en impresiones</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/css/plugins/adminlte.min.css">
  <!-- Main Sidebar Container -->
<div class="text-center ">

     <?php
   $logo = Controladorlogo::ctrlogo();

   echo'
    <!-- Brand Logo -->
    <a href="todoenimpresiones" class="">
      <img src="'.$logo["logo"].'" alt="Todo en impresiones" class="brand-image img-circle elevation-3" style="opacity: .8">
    </a>';
    ?>
</div>

  <footer class="main-footer">
 
    <strong>Copyright &copy; 2021 <a href="https://todoenimpresiones">Todo en impresiones</a>.</strong> Todo los derechos reservados.
  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->

<!-- ./wrapper -->

<!-- jQuery -->
<script src="vistas/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="vistas/js/plugins/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="vistas/js/plugins/demo.js"></script>
</body>
</html>
