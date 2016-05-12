<?php
/**
 * Created by PhpStorm.
 * User: GustavoG
 * Date: 21/04/2016
 * Time: 06:55 PM
 */
//include("conexion/conect.php");
include ("entidades/Administracion/Usuario.php");
include ("funciones/funcion.php");
include("funciones/AnnotationManager.php");

$an = new AnnotationManager();



$us = new Usuario();

$fn = new funcion();
$an->getManyToOn($us,"id");
echo"<br><br><br> <hr>";


print_r($fn->getProperty($us));



echo "<br>".json_encode($fn->getArray($us))."<br>";
echo json_encode(get_object_vars($us));

$fn->setArray($us,json_decode("{\"id\":1443,\"usuario\":\"hola mundo\",\"contrasena\":null,\"fechaNacimiento\":null,\"Permiso_id\":null,\"Persona_id\":null}"));

echo $fn->getValor($us,"usuario")."<br>";
echo $fn->createInsert($us)."<br>";
echo $fn->createUpdate($us)."<br>";
echo $fn->createDelete($us)."<br>";

