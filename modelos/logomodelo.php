<?php


require'Conexion.php';

class Modelologo{


// traer las preguntas
static  public function mdllogo($tabla){

	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");


    $stmt -> execute();
    return $stmt -> fetch(); 
    $stmt-> close();
    $stmt = null;
}

}