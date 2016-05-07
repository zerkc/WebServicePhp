<?php

/**
 * Created by PhpStorm.
 * User: clases
 * Date: 21/04/2016
 * Time: 07:03 PM
 */
class funcion{


    public function getProperty($objeto){
        $reflect = new ReflectionClass($objeto);

        $r = $reflect->getProperties();
        foreach ($r as $r1) {
            echo $r1->getDocComment()."<br>";
        }


        return $reflect->getDefaultProperties();
    }

    public function getValor($object,$nombre){

        $reflect = new ReflectionClass($object);
        $methods = $reflect->getMethods();
        foreach ($methods as $method) {
            if(strtolower($method->getName()) == "get".strtolower($nombre)){
                $metodoReflexionado = new ReflectionMethod($reflect->getName(), $method->getName());
                return $metodoReflexionado->invoke($object);
            }

        }
    }

    public function setValor($object,$nombre,$value){

        $reflect = new ReflectionClass($object);
        $methods = $reflect->getMethods();
        foreach ($methods as $method) {
            if(strtolower($method->getName()) == "set".strtolower($nombre)){
                $metodoReflexionado = new ReflectionMethod($reflect->getName(), $method->getName());
                return $metodoReflexionado->invoke($object,$value);
            }

        }
    }

    public function getArray($object){
        $fields = $this->getProperty($object);
        $array = Array();
        foreach ($fields as $key => $value) {
            $array = array_merge($array,array($key => $this->getValor($object,$key)));
        }

        return $array;
    }

    public function setArray($object,$array){
        foreach ($array as $key => $value) {
            $this->setValor($object,$key,$value);
        }

        return $object;
    }

    public function isPrimary($object,$nombre){
        $reflect = new ReflectionClass($object);
        return $reflect->getProperty($nombre)->getDocComment() == "/** Id */";
    }

    public function createInsert($object){
        $reflect = new ReflectionClass($object);
        $query = "INSERT INTO ".$reflect->getName()." ";
        $filas = " (";
        $valor = " VALUES(";
        $Fields = $this->getProperty($object);
        foreach ($Fields as $Field => $value) {
            $filas .= $Field.",";
            $obj = $this->getValor($object,$Field);
            if(gettype($obj) == "integer" || gettype($obj) == "double"){
                $valor .=$obj.",";
            }else if(gettype($obj) == "string"){
                $valor .="'".$obj."',";
            }else if(gettype($obj) == "object"){
                $valor .="'".$obj."',";
            }else{
                $valor .="null,";
            }
        }

        $filas = substr($filas,0,strlen($filas)-1).")";
        $valor = substr($valor,0,strlen($valor)-1).")";
        return $query.$filas.$valor;
    }

    public function createUpdate($object){
        $reflect = new ReflectionClass($object);
        $query = "UPDATE ".$reflect->getName()." SET ";
        $filas = " WHERE ";
        $valor = " ";
        $Fields = $this->getProperty($object);
        foreach ($Fields as $Field => $value) {
            $obj = $this->getValor($object,$Field);
            if(gettype($obj) == "integer" || gettype($obj) == "double"){
                $valor .=$Field."=".$obj.",";
            }else if(gettype($obj) == "string"){
                $valor .=$Field."='".$obj."',";
            }else if(gettype($obj) == "object"){
                $valor .=$Field."='".$obj."',";
            }

            if($this->isPrimary($object,$Field)){
                $filas .=$Field."=".$obj." ";
            }
        }

        $valor = substr($valor,0,strlen($valor)-1)."";
        return $query.$valor.$filas;
    }

    public function createDelete($object){
        $reflect = new ReflectionClass($object);
        $query = "DELETE FROM ".$reflect->getName()." ";
        $filas = " WHERE ";
        $Fields = $this->getProperty($object);
        foreach ($Fields as $Field => $value) {
            $obj = $this->getValor($object,$Field);

            if($this->isPrimary($object,$Field)){
                $filas .=$Field."=".$obj." ";
            }
        }


        return $query.$filas;
    }
}