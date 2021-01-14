<?php

class ControladorUsuarios{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario(){

		if(isset($_POST["ingUsuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"])){

			   	$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuarios";

				$item = "usuario";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
				//var_dump($respuesta);


				if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar){

					if($respuesta["estado"] == 1){

						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["nombre"] = $respuesta["nombre"];
						$_SESSION["usuario"] = $respuesta["usuario"];
						$_SESSION["foto"] = $respuesta["foto"];
						$_SESSION["rol"] = $respuesta["rol"];
						$_SESSION["sucursal"] = $respuesta["sucursal"];

								/*=============================================
						REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
						=============================================*/

						date_default_timezone_set('America/Bogota');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;

						$item1 = "ultimo_login";
						$valor1 = $fechaActual;

						$item2 = "id";
						$valor2 = $respuesta["id"];

						$ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

						if($ultimoLogin == "ok"){

							
		    	      echo'<script>

						swal({
							  title: "¡Bienvenido '.$_POST["ingUsuario"].'",
							  text: "¡Vamos a trabajar!",
							  type: "success",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
						
						});

					  </script>';


						}

						

					}else{

						
					echo'<script>

							swal({
								 icon:"error",
								  title: "¡El usuario aún no está activado!",
								  type: "error",
 								  confirmButtonText: "Cerrar",
  							   closeOnConfirm: false
							});

							</script>';

					}

				}else{

					
					echo'<script>

							swal({
								 icon:"error",
								  title: "¡ERROR AL INGRESAR!",
								  text: "¡Por favor revise que el email exista o la contraseña coincida con la registrada!",
								  type: "error",
 								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							});

							</script>';

				}



			}	

		}

	}


	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearUsuario(){

		if(isset($_POST["nuevoUsuario"])){

             
				    

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){


	   	$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');


	 	$ruta = $_POST["fotoUsuario"];
	 /*=============================================
	VALIADAR IMAGEN
	=============================================*/
	if(isset($_FILES["nuevaFoto"]["tmp_name"]) && !empty($_FILES["nuevaFoto"]["tmp_name"])){
 /*======================================================
	PREGUNTAMOS SI EXISTE UNA IMAGEN EN LA BASE DE DATOS
	=====================================================*/
	$directorio ="vistas/imagenes/usuarios/".$_POST["nuevoUsuario "];


		mkdir($directorio, 0755);

	 /*======================================================
	 GUARDAMOS LA IMAGEN EN EL DIRECTORIO
	=====================================================*/
	list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

	$nuevoAncho = 500;
	$nuevoAlto = 500;

	if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

    $aleatorio = mt_rand(100, 999);


    $ruta = "vistas/imagenes/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";
    /*======================================================
	MODIFICAMOS UN ALTO Y ANCHO A LA IMAGEN
	=====================================================*/
    $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
       
    imagejpeg($destino, $ruta);
}

if($_FILES["nuevaFoto"]["type"] == "image/png"){
    $aleatorio = mt_rand(100, 999);

    $ruta = "vistas/imagenes/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";
    /*======================================================
	MODIFICAMOS UN ALTO Y ANCHO A LA IMAGEN
	=====================================================*/
    $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

    imagealphablending($destino, false);
    imagesavealpha($destino, true);
    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

       
    imagepng($destino, $ruta);
}



	}else{
		$ruta ="vistas/imagenes/usuarios/avatar/user.png";
	}

 		

			   	$tabla = "usuarios";
				
	                 $datos = array("nombre" => $_POST["nuevoNombre"],
					           "usuario" => $_POST["nuevoUsuario"],
					           "password" => $encriptar,
					           "rol" =>$_POST["nuevoRol"],
					           "sucursal" => $_POST["nuevaSucursal"],
					            "estado"=>0,
					            "ultimo_login"=>"",
					           "foto"=>$ruta);


				$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);
			
				if($respuesta == "ok"){

						echo '<script> 

								swal({
									  title: "¡OK!",
									  text: "¡el usuario ha sido creado correctamente!",
									  type:"success",
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
									
								});

							</script>';


				}	


			}else{

			               	echo '<script> 

								swal({
									  title: "¡ERROR!",
									  text: "¡el usuario no puede ir vacio ni llebar carácteres especiales!",
									  type:"error",
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
									},

									function(isConfirm){

										if(isConfirm){
											
							           window.location = "usuarios";
										}
								});

							</script>';

			}


		}


	

}
	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarUsuarios($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;
	}


	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarUsuario(){

		if(isset($_POST["editarUsuario"])){


                

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/


	 	$ruta = $_POST["fotoActual"];
	 /*=============================================
	VALIADAR IMAGEN
	=============================================*/
	if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){
 /*======================================================
	PREGUNTAMOS SI EXISTE UNA IMAGEN EN LA BASE DE DATOS
	=====================================================*/
	$directorio ="vistas/imagenes/usuarios/".$_POST["idUsuario"];

	if(!empty($_POST["fotoActual"])){

		unlink($_POST["fotoActual"]);
	}else{
		mkdir($directorio, 0755);

	}
	 /*======================================================
	 GUARDAMOS LA IMAGEN EN EL DIRECTORIO
	=====================================================*/
	list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

	$nuevoAncho = 500;
	$nuevoAlto = 500;

	if($_FILES["editarFoto"]["type"] == "image/jpeg"){
    $aleatorio = mt_rand(100, 999);

    $ruta = "vistas/imagenes/usuarios/".$_POST["idUsuario"]."/".$aleatorio.".jpg";
    /*======================================================
	MODIFICAMOS UN ALTO Y ANCHO A LA IMAGEN
	=====================================================*/
    $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);
    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
       
    imagejpeg($destino, $ruta);
}

if($_FILES["editarFoto"]["type"] == "image/png"){
    $aleatorio = mt_rand(100, 999);

    $ruta = "vistas/imagenes/usuarios/".$_POST["idUsuario"]."/".$aleatorio.".png";
    /*======================================================
	MODIFICAMOS UN ALTO Y ANCHO A LA IMAGEN
	=====================================================*/
    $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);
    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

    imagealphablending($destino, false);
    imagesavealpha($destino, true);
    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

       
    imagepng($destino, $ruta);
}



	}


				$tabla = "usuarios";

				if($_POST["editarPassword"] != ""){

					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

						$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					}else{

							echo '<script> 

								swal({
									  title: "¡ERROR!",
									  text: "¡la contraseña no puede ir vacio ni llebar carácteres especiales!",
									  type:"error",
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
									},

									function(isConfirm){

										if(isConfirm){
											
							           window.location = "usuarios";
										}
								});

							</script>';

						  	return;

					}

				}else{

					$encriptar = $_POST["passwordActual"];

				}

				$datos = array("nombre" => $_POST["editarNombre"],
							   "usuario" => $_POST["editarUsuario"],
							   "password" => $encriptar,
							   "rol" => $_POST["editarRol"],
							   "sucursal" => $_POST["editarSucursal"],
							   "foto" => $ruta);

				$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

						
				if($respuesta == "ok"){
	                       echo '<script> 

								swal({
									  title: "¡OK!",
									  text: "¡Su cuenta ha sido actualizada correctamente!",
									  type:"success",
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
									},

									function(isConfirm){

										if(isConfirm){
											
							           window.location = "usuarios";
										}
								});

							</script>';
				    }
				


			}else{

					echo '<script> 

								swal({
									  title: "¡ERROR!",
									  text: "¡el nombre no puede ir vacio ni llebar carácteres especiales!",
									  type:"error",
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
									},

									function(isConfirm){

										if(isConfirm){
											
							           window.location = "usuarios";
										}
								});

							</script>';
			
		}

		}

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarUsuario(){

		if(isset($_GET["idUsuario"])){

			$tabla ="usuarios";
			$datos = $_GET["idUsuario"];

			if($_GET["fotoUsuario"] != ""){

				unlink($_GET["fotoUsuario"]);
				rmdir('vistas/imagenes/usuarios/'.$_GET["usuario"]);

			}

			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

			if($respuesta == "ok"){

			 echo '<script> 

								swal({
									  title: "¡OK!",
									  text: "¡El usuario ha sido eliminado correctamente!",
									  type:"success",
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
									},

									function(isConfirm){

										if(isConfirm){
											
							           window.location = "usuarios";
										}
								});

							</script>';

			}		

		}

	}
}