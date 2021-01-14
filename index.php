<?php
	/*=============================================
			 CONTROLADORES
	=============================================*/
	    
	       require 'controladores/plantillaControlador.php';
	       require 'controladores/usuariosControlador.php';
	       require 'controladores/clientesControlador.php';
	       require 'controladores/productosControlador.php';
	       require 'controladores/pedidosControlador.php';
	       require 'controladores/categoriasControlador.php';
	    
	      
	     
	/*=============================================
	            MODELOS
	=============================================*/
	        require 'modelos/usuariosModelos.php';
	       require 'modelos/clientesModelos.php';
	       require 'modelos/productosModelos.php';
	       require 'modelos/pedidosModelos.php';
	       require 'modelos/categoriasModelos.php';
		
	/*=======================================================
	LLAMADO A LA PLANTILLA AUTOMACTICAMENTE CARGUE LA PAGINA
	=========================================================*/
         $plantilla = new ControladorPlantilla();
          $plantilla -> ctrplantilla();


 ?>
