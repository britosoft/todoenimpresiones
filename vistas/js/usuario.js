/*=============================================
	VALIDAR FORMATO DE  IMAGEN
	=============================================*/
var rutaOculta = $("#rutaOculta").val();
$("#nuevaFoto").change(function(){

	var imagen = this.files[0];
	//console.log("imagen", imagen);


	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" ){

    $("#nuevaFoto").val();

                      swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

	}

	else if(Number(imagen["size"]) >2000000){

                        $("#nuevaFoto").val();

                          swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });


	}else{

 var nuevaFoto = new  FileReader;
 nuevaFoto.readAsDataURL(imagen);

 $(nuevaFoto).on("load", function(event){

 	var rutaImagen = event.target.result;

 	$("#previsualizarImagen").attr("src", rutaImagen);

 })

	} 
})





/*=============================================
EDITAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnEditarUsuario", function(){

	var idUsuario = $(this).attr("idUsuario");
	console.log("idUsuario", idUsuario);
	
	var datos = new FormData();
	datos.append("idUsuario", idUsuario);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			//console.log(respuesta);
			
			$("#editarNombre").val(respuesta["nombre"]);
			$("#editarUsuario").val(respuesta["usuario"]);
			$("#editarRol").html(respuesta["rol"]);
			$("#editarSucursal").html(respuesta["sucursal"]);
			$("#fotoActual").val(respuesta["foto"]);
			$("#passwordActual").val(respuesta["password"]);

			if(respuesta["foto"] != ""){

				$(".previsualizarEditar").attr("src", respuesta["foto"]);

			}else{

				$(".previsualizarEditar").attr("src", "vistas/imagenes/usuarios/avatar/user.png");

			}

		}

	});

})



/*=============================================
	VALIDAR FORMATO DE  IMAGEN AL EDITAR USUARIO
	=============================================*/
var rutaOculta = $("#rutaOculta").val();
$("#editarFoto").change(function(){

	var imagen = this.files[0];
	//console.log("imagen", imagen);


	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" ){

    $("#editarFoto").val();

                      swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

	}

	else if(Number(imagen["size"]) >2000000){

                        $("#editarFoto").val();

                          swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });


	}else{

 var editarFoto = new  FileReader;
 editarFoto.readAsDataURL(imagen);

 $(editarFoto).on("load", function(event){

 	var rutaImagen = event.target.result;

 	$("#previsualizarEditar").attr("src", rutaImagen);

 })

	} 
})




/*=============================================
ACTIVAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnActivar", function(){

	var idUsuario = $(this).attr("idUsuario");
	var estadoUsuario = $(this).attr("estadoUsuario");

	var datos = new FormData();
 	datos.append("activarId", idUsuario);
  	datos.append("activarUsuario", estadoUsuario);

  	$.ajax({

	  url:"ajax/usuarios.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      		if(window.matchMedia("(max-width:767px)").matches){


								swal({
									  title: "¡OK!",
									  text: "¡el usuario ha sido actualizado correctamente!",
									  type:"success",
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
									},

									function(isConfirm){

										if(isConfirm){
											
							           window.location = "usuarios";
										}
								});

	      	}

      }

  	})

  	if(estadoUsuario == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoUsuario',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoUsuario',0);

  	}

})



/*=============================================
ELIMINAR USUARIO
=============================================*/

$(".tablas").on("click", ".btnEliminarUsuario", function(){


  var idUsuario = $(this).attr("idUsuario");
  var fotoUsuario = $(this).attr("fotoUsuario");
  var usuario = $(this).attr("usuario");

	swal({
		  title: "¿Está usted seguro(a) de eliminar este usuario?",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "¡Si, eliminar usuario!",
		  closeOnConfirm: false
		},
		function(isConfirm){
				 if (isConfirm) {	   
				    window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;

				  } 
		});

})
