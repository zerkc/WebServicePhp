<?php
/**
 * Created by PhpStorm.
 * User: GustavoG
 * Date: 21/04/2016
 * Time: 06:55 PM
 */
include("conexion/conect.php");
include ("entidades/Administracion/Usuario.php");
include ("funciones/funcion.php");
include("funciones/AnnotationManager.php");
include("funciones/QueryBuilder.php");
include("entidades/Administracion/Persona.php");

$an = new AnnotationManager();

$qb = new QueryBuilder("SELECT * FROM Usuario ");

$us = new Usuario();

$fn = new funcion();

$qb->
agregarCondicion("Nombre","Like","%Gustavo%",true,true)->
agregarCondicion("Apellido","Like",null,true,false)->
ejecutarQuery(-1);

echo"<br><br><br> <hr>";
$query = $fn->crearQuery("SELECT * FROM Persona ",null,-1,-1);
echo"<br><br><br> ..-<hr>";
print_r($query);

echo"<br><br><br> <hr>";


print_r($fn->getProperty($us));



echo "<br>".json_encode(($query[0]))."<br>";
echo json_encode(get_object_vars($query[0]));

$fn->setArray($us,json_decode("{\"id\":1443,\"usuario\":\"hola mundo\",\"contrasena\":null,\"fechaNacimiento\":null,\"Permiso_id\":null,\"Persona_id\":null}"));

echo $fn->getValor($us,"usuario")."<br>";
echo $fn->createInsert($us)."<br>";
echo $fn->createUpdate($us)."<br>";
echo $fn->createDelete($us)."<br>";

