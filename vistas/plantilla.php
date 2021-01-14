 <?php 


   session_start();
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Todo en impresiones</title>
  <link rel="icon" href="vistas/imagenes/logo/logo.jpeg">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->

    <!-- DataTables -->
  <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/css/plugins/adminlte.css">
<!--sweetalert css -¡-->
 <link rel="stylesheet" href="vistas/css/plugins/sweetalert.css">

<!--sweetalert js -¡-->
  <script src="vistas/js/plugins/sweetalert.min.js"></script>
<!-- jQuery -->
<script src="vistas/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="vistas/js/plugins/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="vistas/js/plugins/demo.js"></script>

<!-- DataTables  & Plugins -->
<script src="vistas/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="vistas/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="vistas/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="vistas/plugins/jszip/jszip.min.js"></script>
<script src="vistas/plugins/pdfmake/pdfmake.min.js"></script>
<script src="vistas/plugins/pdfmake/vfs_fonts.js"></script>
<script src="vistas/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="vistas/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="vistas/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  
</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body class="hold-transition sidebar-mini ">

  <?php

  echo'<div class="wrapper">';

 include 'modulos/cabezote.php';
 include 'modulos/menu.php';

    if(isset($_GET["ruta"])){

      if($_GET["ruta"] == "inicio" || 
       $_GET["ruta"] == "usuarios" ||
       $_GET["ruta"] == "categorias" ||
       $_GET["ruta"] == "productos" ||
       $_GET["ruta"] == "clientes" ||
       $_GET["ruta"] == "pedidos" ||
       $_GET["ruta"] == "reportes" ||
       $_GET["ruta"] == "salir" ||
       $_GET["ruta"] == "crear-pedidos"){

      include "modulos/".$_GET["ruta"].".php";

      }else{

        include "modulos/404.php";

      }

    }else{

      include "modulos/inicio.php";

    }





 include 'modulos/footer.php';

 echo'</div>';


  ?>
  <!-- /.navbar -->



  <!-- /.control-sidebar -->

<!-- ./wrapper -->
<script src="vistas/js/plantilla.js"></script>
 <script src="vistas/js/usuario.js"></script>






</body>
</html>
